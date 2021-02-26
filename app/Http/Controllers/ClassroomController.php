<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(){
        return Classroom::all();
    }

    /**
     * Store a new user.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function show(Request $request, $id){

        if(Classroom::find(19)){
            return Classroom::find(19);
        }
        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas",
            "test" => $request,
            "test2" => $id
        ] , 404);
    }
}
