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
    // public function index($id)
    // {
     
    //      // 全ての投稿を取得
    //     $h_id = Hotel::find($id);
    //     $thishotel = Hotel::where('id','h_id')->get(['h_name','h_img']);
    //     ($thishotel);
        
    //     return view('hotelpage',[
            
    //         'thishotel'=> $thishotel
    //         ]);
            
            
    
    // }
    
     public function favo(int $hotel_id = null)
    {
        
//         // すでにお気に入りしているかの確認
//         $exist = $this->hotel_user($hotel_id);
//         　　// 相手が自分自身かどうかの確認
//         $its_me = $this->id == $hotel_id;
         
//         if ($exist || $its_me) {
//         // すでにお気に入り登録していればお気に入り登録を外す
         
//         return false;
//         } else {
//         // お気に入り登録していなければお気に入り登録をする
//         $this->favorite()->attach($userId);
//         return true;
// }
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //お気に入りする記事
        $hotel = Hotel::find($hotel_id);
        
        if (!empty($hotel)) {
        //リレーションの登録
        $hotel->favo_user()->attach($user);
        
        }
        
        // dd($hotel);
        
        // if($request->'user_id')->isValid()){
        return view('hotelpage') 
        
        ->with([
              'hotel'=> $hotel[$hotel_id],
              'id' =>$hotel->hotel_id,
            ]);
           
        
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
    public function destroy($hotel_id)
    {
        // //
        // $hotel=Hotel::findOrFail($hotel_id);

        // $hotel->favo_user()->delete();
        
        $hotel = Hotel::where('favo_user', \Auth::user()->id)->where('favo_user', $user->id)->find($request->getParameter('id'));
        // $hotel = Hotel::getTable('favo-user')->find($request->getParameter('id'));
        // $this->form = new 
        
        if(!($hotel)){
        $hotel->favo_user->delete();
            
        }
        
        return redirect()->with([
              'hotel'=> $hotel[$hotel_id],
              'id' =>$hotel->hotel_id,
            ]);
    }
    
}
