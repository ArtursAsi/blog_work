<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts;

        return view('home', compact('user','posts'));
    }

    public function password(User $user)
   {
        return view('auth.user.password', compact('user'));
   }

    public function updatePassword(User $user, Request $request)
    {
        if (Hash::check($request->get('old_password'), $user->password)) {
            $user->update([
               'password' => Hash::make($request->get('password'))
           ]);
            return redirect()->route('home')->with('password',"Password updated successfully !");

       } else {
            return redirect()->back()->with('oldPassword', 'Incorrect old password');
        }
    }

    public function email(User $user)
    {
        return view('auth.user.email', compact('user'));
    }

   public function updateEmail(User $user, Request $request)
    {
        $user->update([
            'email' => $request->get('email')
        ]);
        return redirect(route('home'));
    }
}
