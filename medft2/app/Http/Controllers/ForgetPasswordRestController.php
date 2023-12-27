<?php

namespace App\Http\Controllers;

use App\Mail\SendOTP;
use App\Models\m_user;
use App\Models\t_reset_password;
use App\Models\t_token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordRestController extends Controller
{
    public function sendOTP(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100|regex:/^.+@.+$/i'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Format email tidak valid.'], 400);
        }

        // Periksa apakah email sudah terdaftar
        $existingUser = m_user::where('email', $request->email)->where('is_deleted', false)->first();

        if (!$existingUser) {
            return response()->json(['message' => 'Email tidak terdaftar.'], 403);
        }

        $activeUser = m_user::where('email', $request->email)->where('is_deleted', false)->where('is_locked', false)->first();

        if (!$activeUser) {
            return response()->json(['message' => 'Akun anda terkunci.'], 403);
        }

        // Generate OTP (kode dapat diganti sesuai kebutuhan)
        $tempOTP = rand(100000, 999999); // Contoh generate OTP
        $tempEmail = $request->email;
        $otpExpiration = now()->addMinutes(1); // Atur waktu kedaluwarsa OTP

        $token = new t_token();
        $token->email = $tempEmail; // Ambil dari request
        $token->token = $tempOTP; // Ambil dari request
        $token->expired_on = $otpExpiration; // Ambil dari request
        $token->is_expired = false;
        $token->used_for = 'verif for lupapass'; // Sesuaikan dengan kebutuhan Anda
        $token->created_by = 1; // Ambil informasi creator token
        $token->created_on = now();
        $token->save();

        $otp = [
            'tempOTP' => $tempOTP,
            'otpExpiration' => $otpExpiration,
            'tempEmail' => $tempEmail
        ];
        // Kirim OTP ke email
        Mail::to($tempEmail)->send(new SendOTP($tempOTP));

        return response()->json(['message' => 'Kode OTP telah dikirimkan.', 'otp' => $otp], 200);
    }

    public function verifyOTP(Request $request)
    {
        $enteredOTP = $request->otp;
        $expectedOTP = $request->expectedOTP;
        $expiration = $request->expiration;

        // Mengambil nilai dari localStorage jika tersedia
        // $expectedOTP = $this->tempOTP;
        $currentTimestamp = Carbon::now(); // Waktu sekarang

        if ($currentTimestamp->greaterThan($expiration)) {
            // Jika waktu OTP sudah kadaluwarsa
            return response()->json(['message' => 'Kode OTP kadaluarsa, silakan kirim ulang kode OTP.'], 403);
        }

        if ($enteredOTP == $expectedOTP) {
            // Jika OTP valid
            return response()->json(['message' => 'Verifikasi OTP berhasil.'], 200);
        } else {
            // Jika OTP tidak valid
            return response()->json(['message' => 'Verifikasi OTP gagal.'], 403);
        }
    }

    public function resendOTP(Request $request)
    {
        $tempEmail = $request->email;

        // Dapatkan data terakhir dari t_token berdasarkan email
        $latestToken = t_token::where('email', $tempEmail)->orderBy('created_on', 'desc')->first();

        if ($latestToken) {
            // Ubah is_expired menjadi true untuk data terakhir
            $latestToken->is_expired = true;
            $latestToken->modified_by = 1;
            $latestToken->modified_on = now();
            $latestToken->save();
        }

        // Generate OTP baru dan atur waktu kedaluwarsa
        $tempOTP = rand(100000, 999999); // Contoh generate OTP
        $otpExpiration = now()->addMinutes(1); // Atur waktu kedaluwarsa OTP

        // Simpan data OTP baru ke dalam database
        $newToken = new t_token();
        $newToken->email = $tempEmail;
        $newToken->token = $tempOTP;
        $newToken->expired_on = $otpExpiration;
        $newToken->is_expired = false;
        $newToken->used_for = 'verif for lupapass'; // Sesuaikan dengan kebutuhan Anda
        $newToken->created_by = 1; // Ambil informasi creator token
        $newToken->created_on = now();
        $newToken->save();

        $otp = [
            'tempOTP' => $tempOTP,
            'otpExpiration' => $otpExpiration,
            'tempEmail' => $tempEmail
        ];
        // Kirim OTP baru ke email
        Mail::to($tempEmail)->send(new SendOTP($tempOTP));

        return response()->json(['message' => 'Resend OTP berhasil, OTP baru telah dikirim.', 'otp' => $otp], 200);
    }

    // public function resetPassword(Request $request)
    // {
    //     if (m_user::where('email', $request->email)->where('is_deleted', false)->where('is_locked', false)->exists()) {
    //         $newPasswordHash = Hash::make($request->password);
    //         $oldPassword = m_user::where('email', $request->email)
    //             ->where('is_deleted', false)
    //             ->value('password');

    //         // Check jika password baru sama dengan password lama
    //         if (Hash::check($request->password, $oldPassword)) {
    //             return response()->json(['message' => 'Password baru harus berbeda dengan password lama.'], 400);
    //         }

    //         $resetpass = new t_reset_password();
    //         $resetpass->old_password = $oldPassword;
    //         $resetpass->new_password = $newPasswordHash;
    //         $resetpass->reset_for = 'lupa password';
    //         $resetpass->created_by = 1;
    //         $resetpass->created_on = now();
    //         $resetpass->save();

    //         m_user::where('email', $request->email)->where('is_deleted', false)->update([
    //             'password' => $newPasswordHash
    //         ]);

    //         return response()->json(['message' => 'Password berhasil direset'], 200);
    //     } else {
    //         return response()->json(['message' => 'Gagal mereset password'], 404);
    //     }
    // }

    public function resetPassword(Request $request)
    {
        $user = m_user::where('email', $request->email)
            ->where('is_deleted', false)
            ->where('is_locked', false)
            ->first();

        if ($user) {
            $newPasswordHash = Hash::make($request->password);

            // Ambil semua histori password pengguna
            $allUserPasswords = t_reset_password::where('created_by', $user->id)
                ->orderBy('created_on', 'desc')
                ->pluck('old_password')
                ->toArray();

            // Check jika password lama sama dengan password baru
            if (Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Password baru harus berbeda dengan password lama.'], 400);
            }

            // Check apakah password baru ada dalam histori password pengguna
            if (in_array($newPasswordHash, $allUserPasswords)) {
                return response()->json(['message' => 'Password baru tidak boleh sama dengan salah satu password lama.'], 400);
            }

            // Simpan password lama ke dalam histori password
            $resetpass = new t_reset_password();
            $resetpass->old_password = $user->password;
            $resetpass->new_password = $newPasswordHash;
            $resetpass->reset_for = 'lupa password';
            $resetpass->created_by = $user->id;
            $resetpass->created_on = now();
            $resetpass->save();

            // Update password pengguna
            $user->password = $newPasswordHash;
            $user->save();

            return response()->json(['message' => 'Password berhasil direset'], 200);
        } else {
            return response()->json(['message' => 'Gagal mereset password'], 404);
        }
    }

    public function passwordHistory($email)
    {
        $user = m_user::where('email', $email)
            ->where('is_deleted', false)
            ->where('is_locked', false)
            ->first();

        if ($user) {
            $allUserPasswords = t_reset_password::where('created_by', $user->id)
                ->orderBy('created_on', 'desc')
                ->pluck('old_password')
                ->toArray();

            dd($allUserPasswords);
        }
    }
}
