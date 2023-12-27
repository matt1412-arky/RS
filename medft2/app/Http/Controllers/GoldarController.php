<?php

namespace App\Http\Controllers;

use App\Models\m_blood_group;
use Illuminate\Http\Request;

class GoldarController extends Controller
{
    public function index() {
        $blodd = m_blood_group::where('is_delete', false)->get();
        return view('golongan_darah.index',['blodd'=>$blodd]);
    }

    public function form() {
        return view('golongan_darah.form');
    }

    public function create(Request $req) {
        $blodd = new m_blood_group;
        $blodd->code = $req->input('code');
        $blodd->description = $req->input('description');
        $blodd->created_by = $req->user_id;  // user_id
        $blodd->created_on = now()->format('Y-m-d H:i:s');
        $blodd->save();
        return redirect("/h/goldar");
    }

    public function editForm($id){
        $blodd = m_blood_group::where('id',$id)->get();
        return view('golongan_darah.editform',['blodd'=> $blodd]);
    }

    public function editSave(Request $req) {
        $blodd = m_blood_group::find($req->id);
        $blodd->code = $req->input('code');
        $blodd->description = $req->input('description');
        $blodd->modified_by = $req->user_id;  // user_id
        $blodd->modified_on = now()->format('Y-m-d H:i:s');
        $blodd->save();
        return redirect("/h/goldar");
    }

    public function deleteForm($id){
        $blodd = m_blood_group::where('id',$id)->get();
        return view('golongan_darah.deleteform',['blodd'=> $blodd]);
    }

    public function delete(Request $req) {
        $blodd = m_blood_group::where('id', $req->id)->update(['is_delete'=>true,
        'deleted_by' => $req->user_id, // user_id
        'deleted_on' => now()->format('Y-m-d H:i:s')
        ]);
        return redirect("/h/goldar");
    }

}
