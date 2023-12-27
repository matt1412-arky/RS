<?php

namespace App\Http\Controllers;

use App\Models\m_customer;
use Illuminate\Http\Request;

class CustomerRestController extends Controller
{
    public function create(Request $request)
    {
        $customer = new m_customer();
        $customer->biodata_id = $request->biodata_id;
        $customer->created_by = 1;
        $customer->created_on = now();
        $customer->save();

        return response()->json(['message' => 'Customer berhasil ditambahkan', 'customer' => $customer], 200);
    }
}
