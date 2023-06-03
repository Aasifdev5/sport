<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect('dashboard')->with('Sucess', 'Login Successfully');;
        }

        return redirect('/')->with('error', 'Login details are not valid');

       
    }
    function dashboard()
    {
        if(Auth::check())
        {
            return view('welcome');
        }

        return redirect('/')->with('error', 'you are not allowed to access');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('https://sportwebsite.joblly.in/');
      }

    
}