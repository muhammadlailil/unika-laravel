<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(Request $request){
        return view('frontend.login.index');
    }

    function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $loginData = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($loginData)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with([
                'error' => 'Email atau Password Salah',
            ]);
        }
    }

    function getLogout(Request $request){
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    function loginDB(Request $request){
        
        // login by query and session
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('cms_users')->where('email',$email)->first();
        if($user){
            if(Hash::check($password,$user->password)){
                session()->put('user_id',$user->id);
                session()->put('user_email',$user->email);
                session()->put('user_name',$user->name);
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->with([
                    'error' => 'Email atau Password Salah',
                ]);
            }
        }
    }
}
