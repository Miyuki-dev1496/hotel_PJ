<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Str;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    // public function index()
    // {
    //      // 全ての投稿を取得
    //     $mypages = Hotel::get();
      
    //     return view('mypage')
    //         ->with([
    //             'mypages' => $mypages,
    //     // return view('mypage',[
    //     //     'mypage'=> $mypages
    //         ]);
            
    //     // // 全ての投稿を取得
    //     // $hotels = Hotel::get();
        
    //     // if (Auth::check()) {
    //     //      //ログインユーザーのお気に入りを取得
    //     //      $mypage_hotels = Auth::user()->mypage_user()->get();
             
    //     //       return view('mypage',[
    //     //     'hotels'=> $hotels,
    //     //     'mypage_hotels'=>$mypage_hotels
            
    //     //     ]);
            
    //     // }else{
            
    //     //     return view('hotels',[
    //     //     'hotels'=> $hotels
    //     //     ]);
            
    // }
    
    //u_idが一致するものだけを取得    
    //  public function index($user_id)
    // {
       
    //     dd($user_id);
        
    //     $mypages = Hotel::where('user_id',$user_id)->select('h_img','h_name');

    //     return view('mypage',[
    //         'user_id' => $user_id,
    //         'mypages' => $mypages,
    //     ]);
    // }   

    //u_idが一致するものだけを取得    
    //  public function index($user_id)
    // {
       
        
        
    //     $mypages = Hotel::where('user_id',$user_id)->select('h_img','h_name');
    //     dd($mypages,$user_id);

    //     return view('mypage',[
    //         'user_id' => $user_id,
    //         'mypages' => $mypages,
    //     ]);
    // }   

    
    //  public function mypages($user_id)
    // {
    //     //ログイン中のユーザーを取得
    //     $user = Auth::user();
        
    // //     //表示するホテル
    //     $mypages = Hotel::find($user_id)->get();
    //     // $myhotels = Hotel::find();
    //     dd($mypages);
    //     //リレーションの登録
    //     $mypages->mypages()->attach($user);
        
    //   return view('mypage',[
    //         'user_id' => $user_id,
    //         'mypages' => $mypages,
    //     ]);
        
    // }
    
     public function index(Request $request)
    {
        //  // 全ての投稿を取得
        // $myhotels = Hotel::get();
        
        // return view('mypage',[
        //     'myhotels'=> $myhotels
        //     ]);
            
        $user = $request->user();
        $myhotels = $user->load('myhotels');
        
        
        return view('mypage', ['myhotels'=>$myhotels->myhotels]); 
       
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
