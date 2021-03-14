<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpeakerController extends Controller
{
    public function index(){
        return Speaker::all();
    }

    public function show($id){

        if(Speaker::find($id)){
            return Speaker::find($id);
        }

        return response([
            "error" => 404,
            "message" => "L'id transmit n'existe pas"
        ] , 404);

    }

    public function create(Request $request){

        $speaker = new Speaker();
        $input = $request->input();

        if (!isset($input["first_name"]) || !isset($input["last_name"]) || !isset($input["year"])){
            return response([
                "error" => 422,
                "message" => "La requette n'est pas bonne",
            ] , 422);

        }

        elseif(DB::table("speakers")
                ->where('first_name', "=", $input["first_name"])
                ->where("last_name", "=", $input["last_name"])
                ->first())
        {

            return response([
                "error" => 303,
                "message" => "L'intervenant existe déjà",
            ] , 303);

        }

        else{
            $speaker->fill($input)->save();

            return response([
                "error" => 200,
                "message" => "L'intervenant a été créée",
            ] , 200);

        }
    }

    public function update(Request $request){

        $input = $request->input();

        if(Speaker::find($input["id"])){
            if(!isset($input["id"]) ||!isset($input["first_name"]) || !isset($input["last_name"]) || !isset($input["year"])){

                return response([
                    "error" => 422,
                    "message" => "La requette n'est pas bonne",
                ] , 422);

            }
            else{
                $speaker = Speaker::find($input["id"]);
                $speaker->fill($input)->save();

                return response([
                    "error" => 200,
                    "message" => "L'intervenant a bien été modifier",
                ] , 200);
            }
        }
        else{

            return response([
                "error" => 404,
                "message" => "L'intervenant n'existe pas",
            ] , 404);

        }
    }
}
