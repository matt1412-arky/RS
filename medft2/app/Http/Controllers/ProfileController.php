<?php

namespace App\Http\Controllers;

use App\Models\m_biodata;
use App\Models\m_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = m_user::with('biodata','customer')->find($id);
        return view('profile.index', ['user'=>$user]);
        // return response()->json($user);
    } // use with "with"

    public function form($id)
    {
        $user = m_user::with('biodata', 'customer')->find($id);
        return view('profile.form', ['user' => $user]);
    }

    public function bioForm($id)
    {
        $user = m_user::with('biodata', 'customer')->where('id', $id)->first();
        return view('profile.bioForm', ['user' => $user]);
    }
    public function emailForm($id)
    {
        $user = m_user::with('biodata', 'customer')->where('id', $id)->first();
        return view('profile.emailForm', ['user' => $user]);
    }
    public function passForm($id)
    {
        $user = m_user::with('biodata', 'customer')->where('id', $id)->first();
        return view('profile.passForm', ['user' => $user]);
    }
}