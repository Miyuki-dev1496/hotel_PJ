<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Auth;
use Validator;


class HotelpageController extends Controller
{
    //
     public function index($hotel_id)
    {
     
    //      // 全ての投稿を取得
    //     $hotel = Hotel::find($hotel_id);
        
    //     if (Auth::check()) {
        
    //   dd($hotel);
        
    //     if($hotel != null){
    //     return view('hotelpage') 
        
    //     ->with([
    //           'hotel'=> $hotel[$hotel_id]
    //         ]);
    //     }
        if (Auth::check()) {
             //ログインユ
        //このホテルの投稿を取得
        $hotel = Hotel::find($hotel_id);
             
            return view('hotelpage',[
            'hotel'=> $hotel,
            'id' =>$hotel->hotel_id,
            ]);
           
        }else{
            
            return view('hotels');
          
        }
        
    }
}
