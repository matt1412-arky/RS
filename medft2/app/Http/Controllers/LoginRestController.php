<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Validation\ValidationException;

class LoginRestController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = m_user::where('email', $request->email)->first();

        // Jika user ditemukan
        if ($user) {
            // Jika akun terkunci
            if ($user->is_locked) {
                return response()->json(['message' => 'Akun terkunci. Hubungi admin.'], 403);
            }

            // Validasi password
            if (Hash::check($request->password, $user->password)) {      // Tata -> Buat check hashing -> (Hash::check($hashedPassword, $user->password)){ //
                // Jika password cocok, reset login attempt dan update last login
                $user->login_attempt = 0;
                $user->last_login = now();
                $user->save();

                // Login sukses
                return response()->json(['message' => 'Login berhasil'], 200);
            } else {
                // Jika password tidak cocok, tambah login attempt
                $user->login_attempt++;
                $user->save();

                // Jika sudah melebihi batas percobaan, kunci akun
                if ($user->login_attempt >= 3) {
                    $user->is_locked = true;
                    $user->save();
                    return response()->json(['message' => 'Akun terkunci. Hubungi admin.'], 403);
                }

                return response()->json(['message' => 'Email atau password salah.'], 422);
            }
        } else {
            return response()->json(['message' => 'Email atau password tidak valid.'], 422);
        }
    }

    // -- TATA
    public function getCurrentUser($email)
    {
        $user = m_user::where('email', $email)->with('biodata')->first();
        return response()->json([
            'user_id' => $user->id,
            'role_id' => $user->role_id,
            'email' => $user->email,
            'fullname' => $user->biodata->fullname // Pastikan Anda mengganti ini sesuai dengan struktur tabel Anda
        ]);
    }
}
