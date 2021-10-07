<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use Auth;
use Validator;


class HotelpageController extends Controller
{
    //
     public function index($id)
    {
     
     
        if (Auth::check()) {
    
        //このホテルの投稿を取得
        $hotel = Hotel::find($id);
        
         //このホテルをLikeしているユーザーを取得
        // $favousers = User::where('id', $hotel_id)->all();
        // $favousers = User::find($hotel_id);
        $favousers = User::with('favo_hotels')->where('id',$id)->first();
       
        
        // dd($favousers);
        
         return view('hotelpage',[
            'hotel'=> $hotel,
            'id' =>$hotel->hotel_id,
            'favousers'=> $favousers,
            ]);
        
        // } else if  (!empty($favousers)) {
        
        // // $favousers = $hotel_id->load('favo_user.user');
        // // $favousers->favo_hotels()->allRelatedIds();
        
        
        
        
        //     return view('hotelpage',[
        //     'hotel'=> $hotel,
        //     'id' =>$hotel->hotel_id,
        //     'favousers'=> $favousers,
        //     ]);
           
        }else{
            
            return view('top');
          
        }
        
        
    }
    
    
}
