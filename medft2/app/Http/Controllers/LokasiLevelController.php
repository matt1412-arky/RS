<?php

namespace App\Http\Controllers;

use App\Models\m_location_level;
use Illuminate\Http\Request;

class LokasiLevelController extends Controller
{
    public function getAll()
    {
        $lokasi = m_location_level::where('is_delete', false)->get();
        return response()->json($lokasi);
    }

    public function index()
    {

        return m_location_level::all();
    }
}
