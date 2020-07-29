<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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

    use RegistersUsers {
        // change the name of the name of the trait's method in this class
        // so it does not clash with our own register method
           register as registration;
       }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'city' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            'total_books' => 0,
            'google2fa_secret' => $data['google2fa_secret'],
        ]);

        
    }

    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();

        
        $google2fa = app('pragmarx.google2fa');

        
        $registration_data = $request->all();

        
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

        
        $request->session()->flash('registration_data', $registration_data);

       
      /* $QR_Image = $google2fa->getQRCodeInLine(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );
      */

      
        return view('google2fa.register', [  'secret' => $registration_data['google2fa_secret']]);
    }
    

    public function completeRegistration(Request $request)
    {        
       
        $request->merge(session('registration_data'));

       
        return $this->registration($request);
    }
  
}
