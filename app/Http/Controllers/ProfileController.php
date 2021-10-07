<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;


class ProfileController extends Controller
{
    
   public function profile() {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }
}
