<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function login(Request $request){
        $userPhone = ($request->only('phone')['phone']);
        $userPassword = ($request->only('password')['password']);
        $user = User::query()->where('phone', $userPhone)->first();
        if($user['id'] <=> 12){
            if($user['phone'] = ($userPhone)){
                if($user['password'] = ($userPassword)){
                    Auth::login($user);
                    return redirect()->route('posts');
                }
            }
        }

         if($user['id'] = 12){
            if($user['phone'] = ($userPhone)){
                if($user['password'] = ($userPassword)){
                    Auth::login($user);
                    return redirect()->route('admin.posts');
                }
             }
         }


    }

    public function adminlogin(Request $request){

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('posts');
    }
}
