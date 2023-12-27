<?php

namespace App\Http\Controllers;

use App\Models\m_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = m_role::where('is_delete',false)->paginate(10);
        return view('roles.index', ['roles'=> $roles]);
    }
    
    public function form(){
        return view('roles.form');
    }

    public function create(Request $req) {
        $req->validate([
            'name' => 'required|string|max:255|unique:m_roles',
        ]);

        $role = new m_role;
        $role->name = $req->input('name');
        $role->code = $req->input('code');
        $role->created_by = 1;  // user_id
        $role->created_on = now()->format('Y-m-d H:i:s');
        $role->save();
        return redirect("/h/hakakses");
    }

    public function editForm($id){
        $roles = m_role::where('id',$id)->get();
        return view('roles.editform',['roles'=> $roles]);
    }

    public function editSave(Request $req) {
        $role = m_role::find($req->id);
        $role->name = $req->input('name');
        $role->code = $req->input('code');
        $role->modified_by = 1;  // user_id
        $role->modified_on = now()->format('Y-m-d H:i:s');
        $role->save();
        return redirect("/h/hakakses");
    }

    public function deleteForm($id){
        $roles = m_role::where('id',$id)->get();
        return view('roles.deleteform',['roles'=> $roles]);
    }

    public function delete(Request $req) {
        $role = m_role::where('id', $req->id)->update(['is_delete'=>true,
        'deleted_by' => 1, // user_id
        'deleted_on' => now()->format('Y-m-d H:i:s')
        ]);
        return redirect("/h/hakakses");
    }

    public function searchRoles(Request $request)
        {
            $query = $request->input('query');

            $roles = m_role::where('name', 'like', "%$query%")
                            ->orWhere('code', 'like', "%$query%")
                            ->get();

            return view('roles.search-results', compact('roles'));
        }
    public function search(Request $request){
            $searchText = $request->input('searchText');

            // Lakukan pencarian di database
            $results = m_role::where('name', 'LIKE', '%' . $searchText . '%')->get();

            return response()->json($results);
    }

    // public function checkName(Request $request)
    // {
    //     $name = $request->input('name');

    //     $exists = m_role::where('name', $name)
    //         ->where('is_delete', false) // Menambahkan kondisi is_delete false
    //         ->exists();

    //     return response()->json(['exists' => $exists]);
    // }
}
