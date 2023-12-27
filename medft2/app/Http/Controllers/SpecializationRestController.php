<?php

namespace App\Http\Controllers;

use App\Models\m_specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SpecializationRestController extends Controller
{

    public function check($name){
        $exists = m_specialization::where('name','ILIKE',$name)->where('is_delete', false)->first();
        if($exists){
            return response()->json(['dataExist'=>true]);
        }
        return response()->json(['dataExist'=>false]);
    }
    
    public function create(Request $req){
        $specialization  = m_specialization::where('name', 'ilike', $req->name)->where('is_delete', true)->first();
        if($specialization){
            $specialization->is_delete=false;
            $specialization->name = $req->name;
            $specialization->modified_by = $req->user_id;
            $specialization->modified_on = now();
            $specialization->update();
            return Redirect::back()->with('message', 'Data Ditambahkan');;
        } else {
            $specialization = new m_specialization();
            $specialization->name = $req->name;
            $specialization->created_by = $req->user_id;
            $specialization->created_on = now();
            $specialization->save();
            return Redirect::back()->with('message', 'Data Ditambahkan');;
        }
    }

    public function delete(Request $req, $id){
        $specialization = m_specialization::find($id);
        if($specialization){
            $specialization->is_delete = true;
            $specialization->deleted_by = $req->user_id;
            $specialization->deleted_on = now();
            $specialization->update();
            return Redirect::back()->with('message', 'Data Dihapus');;
        } else{
            return response()->json(["message"=>"data tidak ditemukan"], 200);
        }
    }

    public function edit(Request $req, $id){
        $specialization = m_specialization::findOrFail($id);
        // logger("Specialization found:", $specialization);
        if($specialization){
            $specialization->name = $req->name;
            $specialization->modified_by = $req->user_id;
            $specialization->modified_on = now();
            $specialization->update();

            return Redirect::back();
            // return Redirect::back()->with('message', $specialization);;
        } else{
            return response()->json(["message"=>"data tidak ditemukan"], 200);
        }
    } 
}
