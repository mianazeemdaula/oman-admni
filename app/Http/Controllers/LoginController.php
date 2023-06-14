<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return  redirect('dashboard');
        }
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
       $user =  SuperAdmin::where('username', $request->username)->first();

       if ($user && Hash::check($request->password, $user->password)) {
           Auth::login($user);
           return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->withErrors(['username' => 'Credentials not matched.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
