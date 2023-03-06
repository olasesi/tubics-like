<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


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

    public function saveuser2(Request $request)
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
        
        //Here there can be alot unregistered users with the same email address
        $minutes = 60;      //May be moved to config
        Cookie::queue(Cookie::make('youtube_channel', $youtube_channel, $minutes));
        Cookie::queue(Cookie::make('business_email', $business_email, $minutes));
        Cookie::queue(Cookie::make('business_description', $business_description, $minutes));

            $randomCode = random_int(100000, 999999);
            $randomToken = Str::random(30);

            User::create([
                'business_email' => $request->business_email,
                'verification_code' => $randomCode,
                'token' => $randomToken,
                 ]);
             $email_data = ['verification_code'=>$randomCode,'token'=> $randomToken ];
            //To fix random email sending. To also send token in email
            Mail::to($business_email)->send(new RegistrationMail($email_data));   
            return redirect()->route('user.create3'); 
        

    }

    public function createuser3()
    {
       return view('auth.register-2');
    }

    public function createeuser4()
    {
       return view('auth.register-3');
    }

    //There should be operation to remove unregistered users from the table
    public function saveuser3(Request $request) 
    {
            $request->validate(
            [
                'verification_code' => 'required|numeric',
            ]
        );

        if(Cookie::get('youtube_channel') && Cookie::get('business_email') && Cookie::get('business_description')){

            $confirm_registered_users = User::where('active', 1)->where('business_email', Cookie::get('business_email'))->count();
            if($confirm_registered_users == 1){
                User::where('active', 0)->where('business_email', Cookie::get('business_email'))->delete();
               return back()->with('failed', 'Sorry! this email address has already been registered');
            }

            $confirm_row_email_code = User::where('active', 0)->where('verification_code', $request->input('verification_code'))->where('business_email', Cookie::get('business_email'))->count();
            
            if($confirm_row_email_code == 1){
               User::where('business_email', Cookie::get('business_email'))->delete();
               User::create([
                'business_email' => Cookie::get('business_email'),
                'youtube_channel' => Cookie::get('youtube_channel'),
                'business_description' => Cookie::get('business_description'),
                'active_stage1' => 1,
                 ]);

                 return redirect()->route('user.user.create6'); 

            }else{
                return back()->withInput()->with('failed', 'Invalid code.');
            }

        }else{
            return back()->withInput()->with('failed', 'Timeout! Please register again.');
        }

       //return view('auth.register-2');
    }

    public function resendcode()
    {

        if(Cookie::get('business_email')){
        $randomNumber = random_int(100000, 999999);
        $randomToken = Str::random(30);
        //To fix random email sending. To also send token in email
        Mail::to(Cookie::get('business_email'))->send(new RegistrationMail($randomNumber)); 
      
        User::where('active', 0)
          ->where('business_email', Cookie::get('business_email'))
          ->update(['verification_code' => $randomNumber, 'token' => $randomToken]);

        return view('auth.register-2');
        }else{
            return view('auth.register-2');
        }
    }

    public function createcustomizeaccount()
    {
       return view('auth.register-6');
    }
    
    public function savepreparation(Request $request)
    {
        $request->validate(
            [   'language' => 'required',
                'competitive_channel' => 'nullable',
                'keyword' => 'nullable',
            ]
        );
        
       // $users_no = User::where('business_email', Cookie::get('business_email'))->where('active_stage1', 1)->count();
      
        User::where('business_email', Cookie::get('business_email'))->where('active_stage1', 1)->where('active_stage2', 0)
            ->update(['language' => $request->language,'competitive_channel' => $request->competitive_channel,'keyword' => $request->keyword, 'active_stage2'=> '1']);

            return redirect()->route('user.plan'); 
        }

    public function createplan()
    {
        return view('auth.plan');
    }


    public function createverifiedmessage()
    {
       return 'hello';
    }

    

    
    //Confirm if this block of code should be removed
    // public function registeremail()
    // {
    //     return new RegistrationMail();

    // }

    


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
