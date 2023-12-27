<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CariDokterController extends Controller
{
    public function index() {
        // $cardok = ::where('is_delete', false)->get();
        return view('cari_dokter.index');
    }

    public function form() {
        return view('cari_dokter.form');
    }
}
