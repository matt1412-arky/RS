<?php

namespace App\Http\Controllers;

use App\Models\m_biodata;
use Illuminate\Http\Request;

class BiodataRestController extends Controller
{
    public function create(Request $request)
    {
        $biodata = new m_biodata();
        $biodata->fullname = $request->fullname;
        $biodata->mobile_phone = $request->mobile_phone;
        $biodata->image = $request->image;
        $biodata->image_path = $request->image_path;
        $biodata->created_by = 1;
        $biodata->created_on = now()->format('Y-m-d H:i:s');
        $biodata->save();
        return response()->json($biodata, 201);
    }
}
