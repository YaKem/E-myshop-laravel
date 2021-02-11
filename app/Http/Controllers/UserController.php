<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            return "Username or password is not matched";
        } else {
            Session::put('user', $user);
            return redirect('/');
        }
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/login');
    }
}
