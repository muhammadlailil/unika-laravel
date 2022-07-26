<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        // $listData = DB::table('teams')->get(); // select * from teams order by id desc
        $data = Teams::all();
        return view('frontend.about-us.index',[
            'list_team' => $data
        ]);
    }

    public function detail(Request $request,$id){
        $team = Teams::findOrFail($id);
        return view('frontend.about-us.detail',[
            'data' => $team
        ]);
    }
}
