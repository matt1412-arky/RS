<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;

class RegisterRestController extends Controller
{
    public function create(Request $req, $biodata_id)
    {
        $user = new m_user();
        $user->biodata_id = $biodata_id;
        $user->role_id = $req->role_id;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->login_attempt = 0;
        $user->is_locked = false;
        $user->last_login = $req->last_login;
        $user->created_by = 1;
        $user->created_on = now()->format('Y-m-d H:i:s');
        $user->save();
        return response()->json($user, 201);
    }
}
