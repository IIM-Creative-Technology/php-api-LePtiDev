<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function index(){
        return Classroom::all();
    }

    public function indexStudents($id){

        if(Classroom::find($id)){
            $classroom = Classroom::find($id);
            return $classroom->students;
        }

        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas"
        ] , 404);

    }

    public function show($id){

        if(Classroom::find($id)){
            return Classroom::find($id);
        }

        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas"
        ] , 404);

    }

    public function create(Request $request){

        $classroom = new Classroom();
        $input = $request->input();

        if (!isset($input["name"]) || !isset($input["promotion_date"])){

            return response([
                "error" => 422,
                "message" => "La requette n'est pas bonne",
            ] , 422);

        }

        elseif(DB::table("classrooms")->where('name', "=", $input["name"])->first()){

            return response([
                "error" => 303,
                "message" => "La classe existe déjà",
            ] , 303);

        }

        else{
            $classroom->fill($input)->save();

            return response([
                "error" => 200,
                "message" => "La classe a été créée",
            ] , 200);

        }
    }

    public function update(Request $request){

        $input = $request->input();

        if(Classroom::find($input["id"])){
            if(!isset($input["id"]) || !isset($input["name"]) || !isset($input["promotion_date"])){

            return response([
                "error" => 422,
                "message" => "La requette n'est pas bonne",
            ] , 422);

            }
            else{
                $classroom = Classroom::find($input["id"]);
                $classroom->fill($input)->save();

                return response([
                    "error" => 200,
                    "message" => "Classe bien modifier",
                ] , 200);
            }
        }
        else{

            return response([
                "error" => 404,
                "message" => "La classe n'existe pas",
            ] , 404);

        }
    }
}
