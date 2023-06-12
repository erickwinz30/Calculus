<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ModelAccount extends Model
{
    // use HasFactory;

    public function readAccount() {
        $account = DB::table('users')->where('username', Auth::user()->username)->get();
        Log::info($account);
        return $account;
    }

    public function updateAccount($x) {
        $profile_pic_name = $x['username'] . '-' . $x->file('profile_pic')->getClientOriginalName();

        $x->file('profile_pic')->move('profilePic/', $profile_pic_name);

        $account = DB::table('users')->where('username', $x['username'])->update([
            'profile_pic' => $profile_pic_name,
        ]);
    }
}
