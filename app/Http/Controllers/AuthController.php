<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function indexLogin()
    {
        return view("login");
    }

    public function indexRegister()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        $rules = [
            "email" => ["required","unique:users,email","email:dns"],
            "password" => ["required","min:8"],
            "password_confirm" => ["required","min:8"],
            "no_hp" => ["required","min:12"],
        ];
        $message = [
            "email.required" => "Maaf email harus diisi ya",
            "email.unique" => "Maaf email sudah digunakan!",
            "email.email" => "Maaf email tidak valid!",
            "password.required" => "Maaf password harus diisi ya",
            "password.min" => "Maaf password minimal 8 digit",
            "password_confirm.min" => "Maaf password minimal 8 digit",
            "password_confirm.required" => "Maaf konfirmasi password harus diisi ya",
            "no_hp.required" => "Maaf Nomor hp harus diisi ya",
            "no_hp.min" => "Maaf Nomor hp minimal 12 digit",
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()) {
            return redirect()->back()->with("error", $validator->errors()->first());
        } else {
            $email = $request->email;
            $pass = $request->password;
            $no_hp = $request->no_hp;
            $passConfirm = $request->password_confirm;

            if($pass != $passConfirm) {
                return redirect()->back()->with("error", "Maaf password dan konfirmasi password tidak sama");
            } else {
                $createNewUser = new User();
                $createNewUser->email = $email;
                $createNewUser->password = bcrypt($passConfirm);
                $createNewUser->phonenumber = $no_hp;
                $createNewUser->type_user = 1;
                $createNewUser->save();

                return redirect()->route("login")->with("success","User ". $createNewUser->email. " berhasil dibuat dengan password: ". $pass);
            }

        }
    }


    public function login(Request $request)
    {
        $rules = [
            "email" => ["required"],
            "password" => ["required"]
        ];

        $message = [
            "email.required" => "email harus diisi ya",
            "password.required" => "password harus diisi ya",
            "email.email" => "email tidak valid",
        ];
        $credentials = User::where("email", $request->email)->first();

        if(!$credentials) {
            return redirect()->back()->with("error", "Maaf email tidak terdaftar");
        } else {
            if(Hash::check($request->password, $credentials->password)) {
                session(["user" => $credentials]);
                return redirect()->route("home");
            } else {
                return redirect()->route("login")->with("error","Password salah");
            }
        }

    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route("login");
    }

}
