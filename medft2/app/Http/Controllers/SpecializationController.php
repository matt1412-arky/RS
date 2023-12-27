<?php

namespace App\Http\Controllers;

use App\Models\m_specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index(){
        $specialization = m_specialization::where('is_delete', false)->paginate(10)->appends(request()->query());
        return view('specialization.index', ['specialization'=>$specialization]);
    }

    public function find($name){
            $query = m_specialization::where('name','ILIKE','%'.$name.'%')->where('is_delete', false)->paginate(4)->appends(request()->query());
            return view('specialization.index', ['specialization'=>$query]);
    }

    public function addForm(){
        return view('specialization.addForm');
    }
    public function editForm($id){
        $specialization = m_specialization::find($id);
        return view('specialization.editForm',['editspecialization' => $specialization]);
    }
    public function deleteForm($id){
        $specialization = m_specialization::where('id',$id)->first();
        return view('specialization.deleteForm',['deletespecialization' => $specialization]);
    }
}