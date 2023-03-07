<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function createlogin()
    {
        return view('auth.login');
    }

    public function savelogin(Request $request){
        $validatedData = $request->validate([
        'business_email' => 'required|email',
       'password'=> 'required|min:6',
       ]
     );

if (Auth::attempt(['business_email' => $validatedData['business_email'], 'password' => $validatedData['password'], 'active' => 1])) {
        $request->session()->regenerate();

     return redirect()->intended(route('user.home'));
    }else{
        return back()->withInput()->with('failed', 'Sorry! You have entered an invalid credentials');
       
    }

   

    }

    public function logoutsave(){

        Auth::logout();
        return redirect(route('admin.dashboard'));
    }

}