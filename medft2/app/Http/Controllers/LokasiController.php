<?php

namespace App\Http\Controllers;

use App\Models\m_biodata_address;
use App\Models\m_location;
use App\Models\m_location_level;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function getAll()
    {
        $lokasi = m_location::where('is_delete', false)->get();
        return response()->json($lokasi);
    }

    public function index()
    {

        return m_location::all();
    }

    public  function parentLokasi()
    {
        $lokasi = m_location::select('id', 'name', 'location_level_id')->where('parent_id', 0)->get();
        return response()->json($lokasi, 200);
    }

    public  function childLokasi($parent_id)
    {
        $lokasi = m_location::select('id', 'name', 'parent_id', 'location_level_id')->where('parent_id', $parent_id)->get();
        return response()->json($lokasi, 200);
    }

    public function indexview()
    {
        $lokasi = m_location::where('is_delete', false)->paginate(7);
        return view('lokasi.index', ['lokasi' => $lokasi]);
    }

    public function formview()
    {
        $lokasilevel = m_location_level::where('is_delete', false)->get();
        return view('lokasi.form', ['lokasilevel' => $lokasilevel]);
    }

    public function getByID($id)
    {
        if (m_location::where('id', $id)->exists()) {
            $lokasi = m_location::with('level')->find($id);
            return response()->json($lokasi, 200);
        }
    }
    public function getByLocationLevelId($id)
    {
        if (m_location::where('location_level_id', $id)->exists()) {
            $lokasi = m_location::where('location_level_id', $id)->with('level')->get();
            return response()->json($lokasi, 200);
        }
    }
    public function simpan(Request $req)
    {
        $lokasi = new m_location;
        $lokasi ->name = $req-> name;
        $lokasi->parent_id = $req->input('parent_id');
        $lokasi->location_level_id = $req->input('location_level_id');
        $lokasi->created_by = $req->user_id;  // user_id
        $lokasi->created_on = now()->format('Y-m-d H:i:s');

        return response()->json($lokasi, 201);
    }

    public function edit(Request $req, $id)
    {
        if ($rol = m_location::where('id', $id)->exists()) {
            $lokasi = m_location::find($id);
            $lokasi->name = $req->name;
            $lokasi->parent_id = $req->parent_id;
            $lokasi->location_level_id = $req->location_level_id;
            $lokasi->modified_by = $req->user_id;
            $lokasi->modified_on = now()->format('Y-m-d H:i:s');
            $lokasi->save();
            return response()->json($lokasi, 200);
        }
    }
    public function hapus(Request $req, $id)
    {
        if (m_biodata_address::where('location_id', $id)->exists()) {
            return response()->json(['message' => 'Data Masih Digunakan.'], 404);
        } else {
            $role = m_location::where('id', $id)->update([
                'is_delete' => true,
                'deleted_by' => $req->user_id,
                'deleted_on' => now()->format('Y-m-d H:i:s')
            ]);
            return;
        }
    }


    public function checkName(Request $request)
    {
        $name = $request->input('name');

        $exists = m_location::where('name', $name)->exists();

        return response()->json(['exists' => $exists]);
    }
}
