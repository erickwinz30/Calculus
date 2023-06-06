<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModelMainPage extends Model
{
    use HasFactory;

    public function readBreakfast() {
        $breakfast = DB::table('breakfast')->where(Auth::user()->username)->get();
        return $breakfast;
    }

    public function readLunch() {
        $lunch = DB::table('lunch')->where()->get();
        return $lunch;
    }

    public function readDinner() {
        $dinner = DB::table('dinner')->where()->get();
        return $dinner;
    }

    public function readSnack() {
        $snack = DB::table('snack')->where()->get();
        return $snack;
    }
}
