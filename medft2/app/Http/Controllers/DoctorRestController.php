<?php

namespace App\Http\Controllers;

use App\Models\m_doctor;
use Illuminate\Http\Request;

class DoctorRestController extends Controller
{
    public function create(Request $request)
    {
        $doctor = new m_doctor();
        $doctor->biodata_id = $request->biodata_id;
        $doctor->str = rand(100000, 999999);
        $doctor->created_by = 1;
        $doctor->created_on = now();
        $doctor->save();

        return response()->json(['message' => 'Doctor berhasil ditambahkan', 'doctor' => $doctor], 200);
    }
}
