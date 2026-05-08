<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Error;


use App\Models\User;

use function Laravel\Prompts\error;

class AuthController extends Controller
{

    public function login()
    {
        //dd(Hash::make(0000));
        /*if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }else if(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            }else if(Auth::user()->user_type == 3){
                return redirect('student/dashboard');
            }else if(Auth::user()->user_type == 4){
                return redirect('parent/dashboard');
            }
        }*/

        return view('auth.login');
            
    }

    public function register()
    {
        return view('auth.register');
    }

    public function AuthLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = !empty($request->remember) ? true : false;
        $credentials = ['email'=> $email, 'password'=> $password];

        if(Auth::attempt($credentials))
        {
            if(Auth::user()->user_type == 1)
            {
                $request->session()->regenerate();
                return redirect('admin/dashboard');
            }else if(Auth::user()->user_type == 2){
                $request->session()->regenerate();
                return redirect('teacher/dashboard');
            }else if(Auth::user()->user_type == 3){
                $request->session()->regenerate();
                return redirect('student/dashboard');
            }else if(Auth::user()->user_type == 4){
                $request->session()->regenerate();
                return redirect('parent/dashboard');
            }
            
        }else{
            return back()->withErrors([
                'email' => 'Email or password incorrect !'
            ])->onlyInput('email');
        }
        
    }

    public function Authregister(Request $request)
    {
        //dd($request);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => hash::make($password),
        ]);

        return redirect()->route('login')->withSuccess('succes','Account created successfully !');
    }

    public function forgetpassword()
    {
       return view('auth.forget'); 
    }

    public function forgetpass(Request $request)
    {
       $getEmailSingle = user::getEmailSingle($request->email);
       dd($getEmailSingle);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
        

        
    
    

        

        
}
