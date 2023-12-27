<?php

namespace App\Http\Controllers;

use App\Models\m_biodata;
use App\Models\m_customer;
use App\Models\m_user;
use App\Models\t_reset_password;
use App\Models\t_token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;

class ProfileRestController extends Controller
{
    public function OTPGen($email)
    {
        $otpCode = rand(100000, 999999);
        $otpGenTime = now();
        $otpExpire = $otpGenTime->addMinutes(10);


        $otp = [
            'otpCode' => $otpCode,
            'otpExpire' => $otpExpire
        ];
        Mail::send('emails\OTPEmail', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)
                ->subject('MEDFT2 -> OTP');
        });

        return response()->json($otp);
    }

    public function checkEmail($email)
    {
        $userExists = m_user::where('email', $email)->exists();
        return response()->json(['userExist' => $userExists]);
    }

    public function editEmail(Request $req, $id)
    {
        if (m_user::where('id', $id)->exists()) {
            $user = m_user::find($id);
            $user->email = $req->email;
            $user->modified_by = $req->user_id;
            $user->modified_on = now();
            $user->save();

            $token = new t_token();
            $token->email = $req->email;
            $token->user_id = $req->user_id;
            $token->token = $req->token;
            $token->expired_on = $req->tokenExpired;
            $token->is_expired = $req->OTPExpire;
            $token->used_for = 'ganti email';
            $token->created_by = $req->user_id;
            $token->created_on = now();
            $token->save();

            return response()->json(["message" => "email diubah"], 200);
        } else {
            return response()->json(["message" => "data tidak ditemukan"], 200);
        }
    }

    public function checkPassword(Request $req, $id)
    { 
        $user = m_user::where('id', $id)->first(['password']);

        if (!$user) {
            // Handle the case where the user with the given ID is not found
            return response()->json(['passwordSame' => false]);
        }

        $userPassword = $user->password;
        $checkedPassword = $req->password;

        // Use Hash::check() to compare the passwords
        $same = Hash::check($checkedPassword, $userPassword);

        return response()->json(['passwordSame' => $same]);
    }

    public function editPassword(Request $req, $id)
    {
        if (m_user::where('id', $id)->exists()) {
            $user = m_user::find($id);
            $user->password = $req->password;
            $user->modified_by = $req->user_id;
            $user->modified_on = now();
            $user->save();

            $resetPass = new t_reset_password();
            $resetPass->old_password = Hash::make($req->oldPassword);
            $resetPass->new_password = Hash::make($req->password);
            $resetPass->reset_for = 'Ubah Password';
            $resetPass->created_by = $req->user_id;
            $resetPass->created_on = now();
            $resetPass->save();

            return response()->json(["message" => "email diubah"], 200);
        } else {
            return response()->json(["message" => "data tidak ditemukan"], 200);
        }
    }

    public function checkBiodata($phone, $id)
    {
        $user = m_user::with('biodata', 'customer')->where('id', $id)->first();
        if (m_biodata::where('mobile_phone', $phone)->exists()) {
            if($user->biodata->mobile_phone == $phone){
                $biodata = false;
            } else{
                $biodata = true;
            }
        } else {
            $biodata = false;
        }
        return response()->json(['dataExists' => $biodata]);
    }

    public function editBiodata(Request $req, $id)
    {
        if (m_user::where('id', $id)->exists()) {
            $user = m_user::with('customer.biodata')->where('id',$id)->first();
                $user->customer->biodata->fullname = $req->name;
                $user->customer->biodata->mobile_phone = $req->mobile_phone;
                $user->customer->modified_by = $req->user_id;
                $user->customer->modified_on = now();
                $user->customer->biodata->modified_by = $req->user_id;
                $user->customer->biodata->modified_on = now();
            if($user->customer->dob){
                $user->customer->dob = $req->dob;
                $user->customer->modified_by = $req->user_id;
                $user->customer->modified_on = now();
                $user->customer->save();
                $user->customer->biodata->save();
            } else {
                $customer = new m_customer();
                $customer->biodata_id = $user->biodata_id;
                $customer->dob = $req->dob;
                $customer->created_by = $req->user_id;
                $customer->created_on = now();
                $customer->save();
            }
            $user->save();
            // return response()->json($user);
            return Redirect::back();
        }

    }
}
