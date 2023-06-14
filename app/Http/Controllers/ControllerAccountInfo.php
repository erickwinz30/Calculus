<?php

namespace App\Http\Controllers;

use App\Models\ModelAccount;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ControllerAccountInfo extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewAccount() {
        $xx = new ModelAccount();
        $account['account'] = $xx->readAccount();
        $title['title'] = 'Account';

        $allAccount = array_merge($account, $title);
        return view('acc-profile', $allAccount);
    }

    public function updateAccount(Request $x) {
        if ($x->hasFile('profile_pic')) {
            // $x->file('profile_pic')->move('profilePic/', $x->file('profile_pic')->getClientOriginalName());

            $xx = new ModelAccount();
            $xx->updateAccount($x);
            return redirect('account');
        }
    }

    public function bmr(Request $x) {
        $height = $x['height'];
        $weight = $x['weight'];
        $umurDB = Auth::user()->date_of_birth;
        $umur = Carbon::parse($umurDB)->age; // Calculate the current age based on date of birth
        Log::info($umur);
        $sex = Auth::user()->sex;

        if ($sex == 'laki-laki') {
            $bmr = 66.5 + (13.7 * $weight) + (5 * $height) - (6.8 * $umur);
        } else if ($sex == 'perempuan') {
            $bmr = 655 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $umur);
        }
        
        echo 'Hasil BMR = ' .$bmr;
    }
}