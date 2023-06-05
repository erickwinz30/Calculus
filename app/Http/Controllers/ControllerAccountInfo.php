<?php

namespace App\Http\Controllers;

use App\Models\ModelAccount;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ControllerAccountInfo extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewAccount($username) {
        $xx = new ModelAccount();
        $account = $xx->readAccount($username);
        Log::info($account);
        return view('acc-profile', ['account' => $account]);
    }

    public function updateAccount(Request $x) {
        if ($x->hasFile('profile_pic')) {
            // $x->file('profile_pic')->move('profilePic/', $x->file('profile_pic')->getClientOriginalName());

            $xx = new ModelAccount();
            $xx->updateAccount($x);
            return redirect('account/' . $x['username']);
        }
    }
}