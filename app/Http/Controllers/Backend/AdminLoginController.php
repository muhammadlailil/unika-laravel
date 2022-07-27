<?php

namespace App\Http\Controllers\Backend;

use App\Models\CmsUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    function index(Request $request){
        if(session()->has('admin_user')){
            return redirect()->route('admin.dashboard');
        }
        return view('backend.login.index');
    }

    function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:cms_users,email',
            'password' => 'required'
        ]);
        
        $cmsUser = CmsUsers::whereEmail($request->email)->first(); 
        // select * from cms_users where email = $request->email
        if(Hash::check($request->password,$cmsUser->password)){
           session()->put('admin_user',$cmsUser);
           return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with([
                'error'=>'Password anda salah'
            ])->withInput();
        }
    }
}
