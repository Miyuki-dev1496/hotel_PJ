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
    
   
    
     public function index(Request $request)
    {
        //User
        $user = Auth::user();  
        $id = Auth::user()->id;
        
        // //ユーザーがログインユーザーである場合
        // if ($id == $request) {
        //このユーザーが登録したホテル
        $myhotels = $user->load('myhotels');
        // $id = Auth::id();
        
        return view ('mypage', ['myhotels'=>$myhotels->myhotels, 'id'=>$id, 'user'=>$user]); 
            
        // } else {
        //     return view ('top');
        // }
        // //ユーザーがログインユーザーでない場合
        // else {
            
        // $thishotels = $request->load('thishotels');
            
        //     return view ('mypage', ['thishotels'=>$thishotels->thishotels, 'id'=>$id, 'user'=>$user]);
        // }
       
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
