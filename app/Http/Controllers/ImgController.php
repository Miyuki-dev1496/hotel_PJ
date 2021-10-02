<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;

class ImgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        
    
    }
    
   
    public function index()
    {
        $h_img = false;
        if (Storage::disk('local')->exists('public/hotelImages/' . Auth::id() . '.jpg')) {
            $h_img = true;
        }
        return view('/mypage', ['h_img' => $h_img]);
    }

}

