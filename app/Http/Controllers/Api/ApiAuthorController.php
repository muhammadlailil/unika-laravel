<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiAuthorController extends Controller
{
    function getListAuthor(Request $request){
        $data = Author::all();
        if(!$data){
            return response()->json([
                'status' => 404,
                'message' => 'not found',
            ],404);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $data
        ],200);
    }
}
