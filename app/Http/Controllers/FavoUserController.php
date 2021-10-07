<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel; //この行を上に追加
use App\User;//この行を上に追加
// use App\Mypage;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class FavoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($hotel_id)
    // {
    //     //
    //     //  $users = User::get();
    //     //  $thishotel = Hotel::where('favo_user', \Auth::user()->id)->where('favo_user', $user->id)->first();
        
           
            
    //         // $users = User::where('favo_hotels', optional($hotel_id)->hotel_id )->first();
    //         // $users = App\User::find(1)->favo_hotels()->orderBy('users')->get();
            
    //         // $users = User::whereHas('favo_hotels', function ($query) {
    //         //     $query->where('favo_hotels', $hotel_id->id);
    //         // })->get();
                        
    //         // // if (Auth::check()) {
    //         // //      //ログインユーザーのお気に入りを取得
    //         // //      $users = Auth::user()->favo_hotels()->get();
    //         // // $id = Auth::id();
                 
                 
    //         //  return view('hotelpage',[
    //         // 'users'=> $users,
    //         // // 'id' => $id
    //         // ]);
            
            
    // }   
     public function show($id)
    {
        //  // 全ての投稿を取得
        // $myhotels = Hotel::get();
        
        // return view('mypage',[
        //     'myhotels'=> $myhotels
        //     ]);
        // $user = Auth::user();    
        // // $user = $request->user();
        // $myhotels = $user->load('myhotels');
        // $id = $hotel_id;
        
        $favousers = User::where('id', $id)->first();
        if (!empty($favousers)) {
        
        $favousers = $id->load('user');
        
        return view('hotelpage', ['user'=>$favousers->favousers]); 
        } else
        {
            return view('hotelpage');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
