<?php

namespace App\Http\Controllers;

use App\Models\m_biodata;
use App\Models\m_doctor;
use App\Models\m_doctor_education;
use App\Models\t_current_doctor_specialization;
use App\Models\t_doctor_office;
use App\Models\t_doctor_treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileDoctorController extends Controller
{
    public function index($id){
        $profil = m_doctor::with('biodata')->where('is_delete',false)->where('id',$id)->get();
        $specialization = DB::select("
            SELECT s.name FROM t_current_doctor_specializations c
            join m_doctors d on d.id = c.doctor_id
            join m_specializations s on s.id = c.specialization_id
            where d.id = $id
        ");
        $medis = t_doctor_treatment::where('doctor_id',$id)->where('is_delete',false)->get();
        $education = m_doctor_education::with('doctor')->where('is_delete',false)->where('doctor_id',$id)->get();
        $office = t_doctor_office::with(
            'doctor',
            'medicalFacility.medicalFacilityCategory',
            'medicalFacility.location.level')
            ->where('is_delete',false)->where('doctor_id',$id)->get();
        // return response()->json($specialization);
        return view('profile-dokter.index', ['profil'=>$profil,
                                        'specialization'=>$specialization,'imagedata'=>"img",
                                        'medis'=>$medis,
                                        'education'=>$education,
                                        'office'=>$office
                                    ]);
    }

    public function viewimage($id){
        $view = m_doctor::with('biodata')->where('is_delete',false)->where('id',$id)->get();
        return view('profile-dokter.changeimage', ['view'=>$view]);
    }

    public function imgSave(Request $req,$id) {
        $id = m_doctor::where('biodata_id',$id)->first();
        $img = m_biodata::find($req->id);
        $file= $req->file('image');
        $img->image_path = $file->getClientOriginalName();
        $uploaded_folder = public_path().'/photos';
        $file->move($uploaded_folder, $file->getClientOriginalName());

        $img->save();
        // return response()->json(['success'=>1]);
        return redirect("/h/profil-dokter/$id->id");
    }
    
    public function imageSave(Request $req,$id) {
        // $img = m_biodata::find($req->id);
        // $img->image = $req->image;
        // $file= $req->file('image');
        // $img->image_path = $file->getClientOriginalName();

        // $uploaded_folder = public_path().'/photos';
        // $file->move($uploaded_folder, $file->getClientOriginalName());

        // $img->save();
        $req->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageData = file_get_contents($req->path());
        $image = m_biodata::find($req->id);
        // $image = m_biodata::where('id', $id)->first();
        $image->image = $imageData;
    
        $image->save();
        echo($req);
        // return redirect('/images')->with('success', 'Image has been uploaded successfully.');
        $this->error();

        return view('/h/profile-dokter/2', ['imagedata'=>$imageData]);
        // return; //response()->json(['success'=>1]);
    }
}
