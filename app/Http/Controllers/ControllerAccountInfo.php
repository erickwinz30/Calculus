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
            $xx = new ModelAccount();
            $xx->updateAccountWithPicture($x);
            return redirect('account');
        } else {
            $xx = new ModelAccount();
            $xx->updateAccount($x);
            return redirect('account');
        }
    }

    public function getHeightWeight() {
        $xx = new ModelAccount();
        $height_weight['height_weight'] = $xx->readAccount();
        $title['title'] = 'Change Height Weight';

        $allAccount = array_merge($height_weight, $title);
        return view('change-height-weight', $allAccount);
    }

    public function updateHeightWeight(Request $x) {
        $validateData = $x->validate([
            'my-height' => 'required|numeric',
            'my-weight' => 'required|numeric',
        ]);
        $xx = new ModelAccount();
        $xx->height_weight($validateData);

        return redirect('change-height-weight');
    }
}