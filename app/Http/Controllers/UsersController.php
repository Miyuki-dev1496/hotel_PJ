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
    
    public function edit($id) {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }
    
    
    public function update($id, UserRequest $request) {
        $user = Auth::user();
        $form = $request->all();

        $profileImage = $request->file('profile_image');
        if ($profileImage != null) {
            $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/profile');
    }
    
    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }
    // public function show(Post $post)
    // {  
 
    //     $like=FollowUser::where('following_user_id', $user->id)->where('followed_user_id', auth()->user()->id)->first();
    //     return view('userslist.show', compact('userslist', 'like'));
    // }
    
    
    
}
