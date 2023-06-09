<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ControllerLogin extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login()
    {
        Auth::logout();
        return view('login');
    }
    public function actionlogin(Request $x)
    {
        $data = [
            'username' => $x->input('username'),
            'password' => $x->input('password'),
            'role' => 'client'
        ];
        if (Auth::Attempt($data)) {
            return redirect('home');
        } else {
            return redirect('login')->with('error', 'Email atau password salah!!!');
        }
    }
    public function registrasi()
    {
        return view('registrasi');
    }
    public function postregistrasi(Request $x)
    {
        $profile_pic = 'avatar.png';
        $data = $x->all();
        User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'sex' => $data['sex'],
            'date_of_birth' => $data['date_of_birth'],
            'profile_pic' => $profile_pic,
            'role' => 'client'
        ]);
        return redirect("login")
            ->withSuccess('Akun telah terbuat!!!');
    }
}
