<?php

namespace App\Http\Controllers;

use App\Models\m_admin;
use Illuminate\Http\Request;

class AdminRestController extends Controller
{
    public function create(Request $request, $biodata_id)
    {
        $admin = new m_admin();
        $admin->biodata_id = $biodata_id;
        $admin->code = $request->code;
        $admin->created_by = 1;
        $admin->created_on = now();
        $admin->save();

        return response()->json(['message' => 'Admin berhasil ditambahkan', 'admin' => $admin], 200);
    }

    public function getLastAdminCode()
    {
        // Mendapatkan kode terakhir dari database
        $lastAdmin = m_admin::orderBy('id', 'desc')->first();

        if ($lastAdmin) {
            $lastCode = $lastAdmin->code;
            $lastNumber = intval(substr($lastCode, 1)); // Mengambil angka dari kode terakhir
            $nextNumber = $lastNumber + 1;
            $nextCode = 'A' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika belum ada data admin, mulai dari A001
            $nextCode = 'A001';
        }

        return response()->json(['last_code' => $nextCode]);
    }
}
