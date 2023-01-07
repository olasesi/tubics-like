<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;




class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    public function createuser()
    {
        return view('auth.register');
    }

    public function createuser2(Request $request)
    {

        $request->validate(
            [
                'business_email' => 'required|email',
                'youtube_channel' => 'required',
                'business_description' => 'required',
                'terms_and_conditions' => 'accepted',
            ]
        );

        $business_email = $request->input('business_email');
        $youtube_channel = $request->input('youtube_channel');
        $business_description = $request->input('business_description');
        $terms_and_conditions = $request->input('terms_and_conditions');

        // User::create([
        //     'business_email' => $request->business_email,
        //     'youtube_channel' => $request->youtube_channel,
        //     'business_description' => $request->business_description,
        //     'terms_and_conditions' => $request->terms_and_conditions,
        // ]);

        $minutes = 60; 
        Cookie::queue(Cookie::make('youtube_channel',$youtube_channel, $minutes));
        Cookie::queue(Cookie::make('business_email',$business_email, $minutes));
        Cookie::queue(Cookie::make('business_description',$business_description, $minutes));
        Cookie::queue(Cookie::make('terms_and_conditions',$terms_and_conditions,$minutes));
        
        return redirect()->route('user.create3');

    }

    public function createuser3()
    {
        //$value = $request->cookie('youtube_channel');
        return view('auth.register-2');
    }

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
