<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use App\Like;
use Auth;
use Validator;


class HotelpageController extends Controller
{
    //
     public function index($id)
    {
        
        //Userエリアのindex
    
        //このホテルの投稿を取得
        $hotel = Hotel::find($id);
        
        //このホテルをLikeしているユーザーを取得
        // $favousers = User::find($id)->favo_hotels->where('hotel_id',$id)->get();
        // $favousers = User::with('favo_hotels')->where('id',$id)->get();
        // $favousers = $id->load('favo_user.user');
        // $favousers->favo_hotels()->allRelatedIds();
        // $favousers = User::where('id', $id)->get();
        $favousers =Auth::user()->favo_hotels()->where('hotel_id',$id)->get();
        // dd($favousers);
        
         if (Auth::check()) {
        
      
        //ログインユーザーがこのホテルをLikeしているかどうか
        $isliked = Auth::user()->favo_hotels()->where('hotel_id',$id)->exists();
        
        //  $favousers = User::find('user_id')->favo_hotels()->where('hotel_id', $id)->get();
       
        // dd($favouser);
             
            return view('/hotelpage',[
            'hotel'=> $hotel,
            'id' =>$hotel['hotel_id'],
            'favousers'=> $favousers,
            'isliked' => $isliked
            // 'likes'=> $likes
            
            ]);
            
        }else{
            
            return view('/hotelpage',[
            'hotel'=> $hotel
            ]);
            
        }
       
        
        
    }
    //   public function isLikedByMe($id){
        
    // $hotel = Hotel::findOrFail($id)->first();
    // if (Hotel::whereUserId(Auth::id())->whereHotelId($hotel->id)->exists()){
    //     return 'true';
    // }
    // return 'false';
    // }
    
    
}
