<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {


        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => $request->password
        ]);



        Auth::login($user);

        return redirect()->route('posts');

    }
}
