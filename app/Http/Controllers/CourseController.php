<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(){
        return Course::all();
    }

    public function show($id){

        if(Course::find($id)){
            return Course::find($id);
        }

        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas"
        ] , 404);

    }

    public function create(Request $request){

        $course = new Course();
        $input = $request->input();

        if (!isset($input["name"]) ||
            !isset($input["start"]) ||
            !isset($input["end"]) ||
            !isset($input["classroom_id"]) ||
            !isset($input["speaker_id"])){

            return response([
                "error" => 422,
                "message" => "La requette n'est pas bonne",
            ] , 422);

        }

        elseif(DB::table("courses")
            ->where('name', "=", $input["name"])
            ->where('start', "=", $input["start"])
            ->where('classroom_id', "=", $input["classroom_id"])
            ->first()){

            return response([
                "error" => 303,
                "message" => "Le cours existe déjà",
            ] , 303);

        }

        else{
            if(Speaker::find($input["speaker_id"]) && Classroom::find($input["classroom_id"])){

                $start = date_create_from_format('Y-m-d H:i:s', $input["start"]);
                $end = date_create_from_format('Y-m-d H:i:s', $input["end"]);

                if(date_diff($start, $end)->days > 5){
                    return response([
                        "error" => 422,
                        "message" => "Le cours ne peux pas durée plus de 5 jours",
                    ] , 422);
                }
                else{
                    $course->fill($input)->save();

                    return response([
                        "error" => 200,
                        "message" => "Le cours a été ajouté",
                    ] , 200);
                }
            }
            else{
                return response([
                    "error" => 422,
                    "message" => "L'id de la classe ou de l'intervenant est incorrect",
                ] , 422);
            }
        }
    }

    public function update(Request $request){

        $input = $request->input();

        if(Course::find($input["id"])){
            if(!isset($input["id"]) ||
            !isset($input["name"]) ||
            !isset($input["start"]) ||
            !isset($input["end"]) ||
            !isset($input["classroom_id"]) ||
            !isset($input["speaker_id"])){

                return response([
                    "error" => 422,
                    "message" => "La requette n'est pas bonne",
                ] , 422);

            }
            else{
                if(Speaker::find($input["speaker_id"]) && Classroom::find($input["classroom_id"])){
                    $classroom = Course::find($input["id"]);
                    $classroom->fill($input)->save();

                    return response([
                        "error" => 200,
                        "message" => "Le cours a bien été modifier",
                    ] , 200);
                }
                else{
                    return response([
                        "error" => 422,
                        "message" => "L'id de la classe ou de l'intervenant est incorrect",
                    ] , 422);
                }
            }
        }
        else{

            return response([
                "error" => 404,
                "message" => "Le cours n'existe pas",
            ] , 404);

        }
    }
}
