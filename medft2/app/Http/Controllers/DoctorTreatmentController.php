<?php

namespace App\Http\Controllers;

use App\Models\m_doctor;
use App\Models\t_current_doctor_specialization;
use App\Models\t_doctor_treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DoctorTreatmentController extends Controller
{
    public function index($id){
        $treatment = t_doctor_treatment::where('is_delete', false)->where('doctor_id', $id)->get();
        if($treatment->isNotEmpty()){
            return view('doctorTreatment.index', ['treatment'=>$treatment]);
        }
        return view('doctorTreatment.index', ['treatment'=>null]);
    }

    public function form($id){
        if(m_doctor::where('id', $id)->exists()){
            return view('doctorTreatment.form', ['doctor_id'=>$id]);
        }
    }

    public function deleteForm($id, $id_treatment){
        if(m_doctor::where('id', $id)->exists()){
            $treatment = t_doctor_treatment::where('is_delete', false)
                                            ->where('doctor_id', $id)
                                            ->where('id', $id_treatment)
                                            ->first();
            return view('doctorTreatment.deleteForm', ['treatment' => $treatment]);
        }
    }

    public function checkName($name, $doctor_id){
        $exists = t_doctor_treatment::where('doctor_id', $doctor_id)->where('name','ilike',$name)->where('is_delete', false)->first();
        if($exists){
            $oldName = strtolower($exists->name);
            $newName = strtolower($name);
            if($oldName == $newName){
                return response()->json(['dataExist' => true]);
            }
        } return response()->json(['dataExist' => false]);
    }

    public function tambah(Request $req){
        $exists = t_doctor_treatment::where('doctor_id', $req->doctor_id)->where('name','ilike', $req->name)->first();
        if($exists){
            $exists->update([
                'name'=> $req->name,
                'is_delete'=>false,
                'modified_by'=>$req->user_id,
                'modified_on'=>now()
            ]);
            return response()->json($exists);
            } else{
            $treatment = t_doctor_treatment::create([
                'name' => $req->name,
                'doctor_id' => $req->doctor_id,
                'created_by' => $req->user_id,
                'created_on' => now()
            ]);
            return response()->json($treatment);
        }
        return response()->json(['pesan'=>'data tidak masuk']);
        
    }
    public function hapus(Request $req){
        if(t_doctor_treatment::where('id', $req->treatment_id)->exists()){
            $treatment = t_doctor_treatment::find($req->treatment_id);
            $treatment->is_delete = true;
            $treatment->deleted_by = $req->user_id;
            $treatment->deleted_on = now();
            $treatment->update();
            return Redirect::back();
        } else{
            return response()->json(["message"=>"data tidak ditemukan"], 200);
        }
    }
}


