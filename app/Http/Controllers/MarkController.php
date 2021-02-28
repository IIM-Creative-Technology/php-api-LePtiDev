<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    public function show($id){
        if(Student::find($id)){
            $sutdentMarks = Student::find($id);
            return $sutdentMarks->marks;
        }
        return response([
            "error" => 404,
            "message" => "L'id de l'étudiant n'existe pas"
        ] , 404);
    }

    public function create(Request $request){

        $classroom = new Mark();
        $input = $request->input();

        if (!isset($input["mark"]) || !isset($input["student_id"]) || !isset($input["course_id"])){

            return response([
                "error" => 422,
                "message" => "La requette n'est pas complète",
            ] , 422);

        }
        else{

            if(Classroom::find($input["course_id"]) && Student::find($input["student_id"])){

                if(DB::table('marks')
                    ->where('course_id', $input['course_id'])
                    ->where('student_id', $input['student_id'])
                    ->first()
                ){
                    return response([
                        "error" => 303,
                        "message" => "La note existe déjà",
                    ] , 303);
                }

                else{
                    if($input["mark"] > 20 || $input["mark"] < 0){
                        return response([
                            "error" => 422,
                            "message" => "La note doit être comprise entre 0 et 20",
                        ] , 422);
                    }
                    else{
                        $classroom->fill($input)->save();
                        return response([
                            "error" => 200,
                            "message" => "La note a été créée",
                        ] , 200);
                    }
                }

            }
            else{
                return response([
                    "error" => 422,
                    "message" => "Le cours renseigné ou l'étudiant n'existe pas",
                ] , 422);
            }
        }
    }
}
