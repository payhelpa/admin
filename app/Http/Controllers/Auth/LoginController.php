<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
//use App\Http\Requests\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * create a new controller instance.
     *
     * @return void
     *
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(auth()->user()->role == 0){
                return redirect('dashboard');
            }
            else{
                return redirect('subadmin.subusersnig');
            }
        }else{
            return redirect()->route('login')->with('error', 'wrong');
        }return redirect()->intended('dashboard');

        // if(auth()->attempt(array('email'=>$validator['email'],'password'=>$validator['password']))){
        //     if(auth()->user()->role == 0){
        //         return redirect('users');
        //     }
        //     else{
        //         return redirect('dashboard');
        //     }
        // }else{
        //     return redirect()->route('login')->with('error', 'wrong');
        // }
    }

}
