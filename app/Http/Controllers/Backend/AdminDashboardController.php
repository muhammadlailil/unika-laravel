<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    function index(Request $request){
        return view('backend.dashboard.index',[
            'page_title' => 'Beranda'
        ]);
    }
}
