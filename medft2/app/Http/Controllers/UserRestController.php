<?php

namespace App\Http\Controllers;

use App\Mail\SendOTP;
use App\Models\m_user;
use App\Models\t_token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserRestController extends Controller
{
    public function sendOTP(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'email' => 'required|email|max:100' // Sesuaikan dengan aturan validasi yang Anda inginkan
        ]);

        // Periksa apakah email sudah terdaftar
        $existingUser = m_user::where('email', $request->email)
            ->where('is_deleted', false)
            ->first();

        if ($existingUser) {
            return response()->json(['message' => 'Email sudah terdaftar.'], 403);
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
        $token->used_for = 'verif untuk regis'; // Sesuaikan dengan kebutuhan Anda
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
            // $token = new t_token();
            // $token->email = $request->tempEmail; // Ambil dari request
            // $token->token = $request->tempOTP; // Ambil dari request
            // $token->expired_on = $request->otpExpiration; // Ambil dari request
            // $token->is_expired = false;
            // $token->used_for = 'verif untuk regis'; // Sesuaikan dengan kebutuhan Anda
            // $token->created_by = 1; // Ambil informasi creator token
            // $token->created_on = now();
            // $token->save();
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
        $newToken->used_for = 'verif untuk regis'; // Sesuaikan dengan kebutuhan Anda
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
}
