<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('userslist')
            ->with([
                'users' => $users,
            ]);
    }
    
    // public function show(Post $post)
    // {  
 
    //     $like=FollowUser::where('following_user_id', $user->id)->where('followed_user_id', auth()->user()->id)->first();
    //     return view('userslist.show', compact('userslist', 'like'));
    // }
    
    
    
}
