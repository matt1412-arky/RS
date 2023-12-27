<?php

namespace App\Http\Controllers;

use App\Models\m_role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function form()
    {
        $role = m_role::get();
        return view('auth.register.register', ['role' => $role]);
    }
}
