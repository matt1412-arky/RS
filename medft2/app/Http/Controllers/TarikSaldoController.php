<?php

namespace App\Http\Controllers;

use App\Models\m_wallet_default_nominal;
use App\Models\t_customer_wallet;
use Illuminate\Http\Request;

class TarikSaldoController extends Controller
{
    public function index($id) {
        $nominal = m_wallet_default_nominal::where('is_delete', false)->get();
        $saldo = t_customer_wallet::where('customer_id',$id)->first();
        return view('penarikan_saldo.index',[
            'nominal'=>$nominal,
            'saldo' => $saldo,
        ]);
    }

    public function form() {
        return view('penarikan_saldo.form');
    }
}
