<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPost(Request $request)
    {
        return view('post.index',[
            'nama' => '<h1>Mahfud</h1>'
        ]);
    }
}
