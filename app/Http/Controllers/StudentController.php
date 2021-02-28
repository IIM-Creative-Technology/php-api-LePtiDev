<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        return Student::all();
    }

    public function indexMarks($id){
        if(Student::find($id)){
            $student = Student::find($id);
            return $student->marks;
        }

        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas"
        ] , 404);

    }

    public function show($id){

        if(Student::find($id)){
            return Student::find($id);
        }

        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas"
        ] , 404);

    }

    public function create(Request $request){

        $classroom = new Student();
        $input = $request->input();

        if (!isset($input["first_name"]) || !isset($input["last_name"]) || !isset($input["age"]) || !isset($input["year"]) || !isset($input["classroom_id"])){

            return response([
                "error" => 422,
                "message" => "La requette n'est pas complète",
            ] , 422);

        }

        else{

            if(Classroom::find($input["classroom_id"])){

                if(DB::table('students')
                    ->where('first_name', $input['first_name'])
                    ->where('last_name', $input['last_name'])
                    ->first()
                ){
                    return response([
                        "error" => 303,
                        "message" => "L'étudiant existe déjà",
                    ] , 303);
                }

                else{
                    $classroom->fill($input)->save();
                    return response([
                        "error" => 200,
                        "message" => "L'étudiant a été créée",
                    ] , 200);
                }

            }
            else{
                return response([
                    "error" => 422,
                    "message" => "La classe renseignée n'existe pas",
                ] , 422);
            }
        }
    }

    public function update(Request $request){

        $input = $request->input();

        if(Student::find($input["id"])){
            if(
                !isset($input["first_name"]) ||
                !isset($input["last_name"]) ||
                !isset($input["last_name"]) ||
                !isset($input["age"]) ||
                !isset($input["year"]) ||
                !isset($input["classroom_id"]))
            {

                return response([
                    "error" => 422,
                    "message" => "La requette n'est pas bonne",
                ] , 422);

            }

            else{
                if(Classroom::find($input["classroom_id"])){
                    $classroom = Student::find($input["id"]);
                    $classroom->fill($input)->save();

                    return response([
                        "error" => 200,
                        "message" => "L'étudiant a bien été modifier",
                    ] , 200);
                }
                else{
                    return response([
                        "error" => 422,
                        "message" => "La classe attribué à l'élève n'existe pas",
                    ] , 422);
                }
            }
        }
        else{

            return response([
                "error" => 404,
                "message" => "L'étudiant n'existe pas",
            ] , 404);

        }
    }

    public function destroy($id){

        if(Student::find($id)){
            Student::destroy($id);
            return response([
                "error" => 200,
                "message" => "L'étudiant a bien été supprimé",
            ] , 200);
        }
        else{
            return response([
                "error" => 404,
                "message" => "L'id transmit n'existe pas",
            ] , 404);
        }
    }
}
