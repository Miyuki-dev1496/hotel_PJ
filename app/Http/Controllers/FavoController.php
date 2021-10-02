<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel; //この行を上に追加
use App\User;//この行を上に追加
// use App\Mypage;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加

class FavoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
         // 全ての投稿を取得
        $hotels = Hotel::get();
        
        return view('hotelpage',[
            
            'hotels'=> $hotels
            ]);
    
    }
    
     public function favo($hotel_id)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $hotel = Hotel::find($hotel_id);
        
        //リレーションの登録
        $hotel->favo_user()->attach($user);
        
        return redirect('/hotelpage');
        
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
    public function show($id)
    {
        //
    }

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
