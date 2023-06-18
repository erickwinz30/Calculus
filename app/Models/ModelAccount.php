<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ModelAccount extends Model
{
    // use HasFactory;

    public function readAccount() {
        $account = DB::table('users')->where('username', Auth::user()->username)->get();
        Log::info($account);
        return $account;
    }

    public function updateAccount($x) {
        if($x['password']) {
            $account = DB::table('users')->where('username', Auth::user()->username)->update([
                'sex' => $x['sex'],
                'date_of_birth' => $x['date_of_birth'],
                'email'=>$x['email'],
                'password'=>Hash::make($x['password']),
            ]);
            $this->updateBMR();
        } else {
            $account = DB::table('users')->where('username', Auth::user()->username)->update([
                'sex' => $x['sex'],
                'date_of_birth' => $x['date_of_birth'],
                'email'=>$x['email'],
            ]);
            $this->updateBMR();
        }
    }

    public function updateAccountWithPicture($x) {
        $profile_pic_name = Auth::user()->username . '-' . $x->file('profile_pic')->getClientOriginalName();

        $x->file('profile_pic')->move('profilePic/', $profile_pic_name);

        if ($x['password']) {
            $account = DB::table('users')->where('username', Auth::user()->username)->update([
                'profile_pic' => $profile_pic_name,
                'sex' => $x['sex'],
                'date_of_birth' => $x['date_of_birth'],
                'email'=>$x['email'],
                'password'=>$x['password'],
            ]);
        } else {
            $account = DB::table('users')->where('username', Auth::user()->username)->update([
                'profile_pic' => $profile_pic_name,
                'sex' => $x['sex'],
                'date_of_birth' => $x['date_of_birth'],
                'email'=>$x['email'],
            ]);
        }
        
        
        $this->updateBMR();
    }

    public function height_weight($data) {
        $currentHeight = DB::table('users')->where('height', Auth::user()->height)->get();
        $currentWeight = DB::table('users')->where('weight', Auth::user()->weight)->get();

        if($currentHeight == null || $currentWeight == null) {
            $height_weight = DB::table('users')->where('username', Auth::user()->username)->insert([
                'height' => $data['my-height'],
                'weight' => $data['my-weight'],
            ]);

            $newHeight = $data['my-height'];
            $newWeight = $data['my-weight'];
            $umur = Carbon::parse(Auth::user()->date_of_birth)->age;
            $sex = Auth::user()->sex;

            if ($sex == 'Laki-laki') {
                $bmr = 66.5 + (13.7 * $newWeight) + (5 * $newHeight) - (6.8 * $umur);

                $saveBMR = DB::table('users')->where('username', Auth::user()->username)->insert([
                    'bmr' => $bmr
                ]);
            } else if ($sex == 'Perempuan') {
                $bmr = 655 + (9.6 * $newWeight) + (1.8 * $newHeight) - (4.7 * $umur);

                $updateBMR = DB::table('users')->where('username', Auth::user()->username)->insert([
                    'bmr' => $bmr
                ]);
            }

        } else {
            $height_weight = DB::table('users')->where('username', Auth::user()->username)->update([
                'height' => $data['my-height'],
                'weight' => $data['my-weight'],
            ]);

            $newHeight = $data['my-height'];
            $newWeight = $data['my-weight'];
            $umur = Carbon::parse(Auth::user()->date_of_birth)->age;
            $sex = Auth::user()->sex;

            if ($sex == 'Laki-laki') {
                $bmr = 66.5 + (13.7 * $newWeight) + (5 * $newHeight) - (6.8 * $umur);

                $saveBMR = DB::table('users')->where('username', Auth::user()->username)->update([
                    'bmr' => $bmr
                ]);
            } else if ($sex == 'Perempuan') {
                $bmr = 655 + (9.6 * $newWeight) + (1.8 * $newHeight) - (4.7 * $umur);

                $updateBMR = DB::table('users')->where('username', Auth::user()->username)->update([
                    'bmr' => $bmr
                ]);
            }
        }
    }

    public function updateBMR() {
        $newHeight = Auth::user()->height;
        $newWeight = Auth::user()->weight;
        $umur = Carbon::parse(Auth::user()->date_of_birth)->age;
        $sex = Auth::user()->sex;

        if ($sex == 'Laki-laki') {
            $bmr = 66.5 + (13.7 * $newWeight) + (5 * $newHeight) - (6.8 * $umur);

            $saveBMR = DB::table('users')->where('username', Auth::user()->username)->update([
                'bmr' => $bmr
            ]);
        } else if ($sex == 'Perempuan') {
            $bmr = 655 + (9.6 * $newWeight) + (1.8 * $newHeight) - (4.7 * $umur);

            $saveBMR = DB::table('users')->where('username', Auth::user()->username)->update([
                'bmr' => $bmr
            ]);
        }
    }
}
