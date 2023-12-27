<?php

namespace App\Http\Controllers;

use App\Models\m_biodata;
use App\Models\m_blood_group;
use App\Models\m_customer;
use App\Models\m_customer_member;
use App\Models\m_customer_relation;
use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index(){
        $pasien = m_customer_member::where('is_delete',false)->with('customer.biodata','customerRelation')->get();
        // return response()->json($pasien);
        return view('pasien.index', ['pasien'=> $pasien]);
    }

    public function home(){
        return m_customer_member::with('customer.biodata','customerRelation')->get();
    }

    public function form(){
        $blood = m_blood_group::get();
        $relation = m_customer_relation::get();
        return view('pasien.form', ['blood'=> $blood,'relation'=>$relation]);
    }
    
    public function create(Request $req) {
        
        $pasien = new m_customer();
        $pasienMember = new m_customer_member();
        $biodata = new m_biodata();
        
        $pasienMember->parent_biodata_id = 1;  // user-> biodata_id

        $pasienMember->customer_relation_id = $req->relasi;  
        $pasienMember->created_by = 1;  // user_id
        $pasienMember->created_on = now()->format('Y-m-d H:i:s');
        
        $biodata->fullname = $req->fullname;
        $biodata->created_by = 1;  // user_id
        $biodata->created_on = now()->format('Y-m-d H:i:s');
        $biodata->save();
        $biodata_id = m_biodata::orderBy('id', 'desc')->first()->id;
        
        $pasien->biodata_id = $biodata_id;
        
        $pasien->dob = $req->input('dob');
        $pasien->gender = $req->input('gender');
        $pasien->blood_group_id = $req->input('blood');
        $pasien->rhesus_type = $req->input('rhesusType');
        $pasien->height = $req->input('height');
        $pasien->weight = $req->input('weight');
        
        $pasien->created_by = 1;  // user_id
        $pasien->created_on = now()->format('Y-m-d H:i:s');
        $pasien->save();
        $customer_id = m_customer::orderBy('id', 'desc')->first()->id;
        $pasienMember->customer_id = $customer_id;
        $pasienMember->save();
        return redirect("/h/pasien");
    }

    public function editForm($id){
        $pasien = m_customer_member::where('id',$id)->get();
        $blood = m_blood_group::get();
        $relation = m_customer_relation::get();
        return view('pasien.editform', ['blood'=> $blood,'relation'=>$relation,'pasien'=> $pasien]);
    }

    public function editSave(Request $req) {
        
        $pasienMember = m_customer_member::find($req->id);
        $pasien = m_customer::where('id', $pasienMember->customer_id)->first();
        $biodata = m_biodata::where('id', $pasien->biodata_id)->first();
        
        $pasienMember->parent_biodata_id = 1;  // user-> biodata_id

        $pasienMember->customer_relation_id = $req->relasi;  
        $pasienMember->created_by = 1;  // user_id
        $pasienMember->created_on = now()->format('Y-m-d H:i:s');
        
        $biodata->fullname = $req->fullname;
        $biodata->created_by = 1;  // user_id
        $biodata->created_on = now()->format('Y-m-d H:i:s');
        $biodata->save();
        $biodata_id = m_biodata::orderBy('id', 'desc')->first()->id;
        
        $pasien->biodata_id = $biodata_id;
        
        $pasien->dob = $req->input('dob');
        $pasien->gender = $req->input('gender');
        $pasien->blood_group_id = $req->input('blood');
        $pasien->rhesus_type = $req->input('rhesusType');
        $pasien->height = $req->input('height');
        $pasien->weight = $req->input('weight');
        
        $pasien->created_by = 1;  // user_id
        $pasien->created_on = now()->format('Y-m-d H:i:s');
        $pasien->save();
        $customer_id = m_customer::orderBy('id', 'desc')->first()->id;
        $pasienMember->customer_id = $customer_id;
        $pasienMember->update();
        return redirect("/h/pasien");
    }


    public function deleteForm($id){
        $pasien = m_customer_member::where('id',$id)->get();
        $blood = m_blood_group::get();
        $relation = m_customer_relation::get();
        return view('pasien.deleteform', ['blood'=> $blood,'relasi'=>$relation,'pasien'=> $pasien]);
    }

    public function delete(Request $req) {
        $role = m_customer_member::where('id', $req->id)->update(['is_delete'=>true,
        'deleted_by' => 1, // user_id
        'deleted_on' => now()->format('Y-m-d H:i:s')
        ]);
        return redirect("/h/pasien");
    }
    public function deleteApi($id) {
        $pasien = m_customer_member::where('id', $id)->update(['is_delete'=>true,
        'deleted_by' => 1, // user_id
        'deleted_on' => now()->format('Y-m-d H:i:s')
        ]);
        return response()->json(['message'=>'deleted']);
    }

    public function search($srch){
        $pasien = DB::select("
            SELECT * FROM customer_members WHERE 
            name ILIKE '%".$srch."%' 
            or 
            description ILIKE '%".$srch."%' 
        ");
        return response()->json($pasien);

        // if (Product::where('id',$id)->exists()){
        //     $product = DB::where('name.category')->find($id);
        //     return response()->json($product,200);
        // }
    }
}
