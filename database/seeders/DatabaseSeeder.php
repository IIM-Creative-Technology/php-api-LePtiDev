<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Mark;
use App\Models\Speaker;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Seeder for only the admin (add on the bord if you want to have access)


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('classrooms')->truncate();
        DB::table('speakers')->truncate();
        DB::table('students')->truncate();
        DB::table('courses')->truncate();
        DB::table('marks')->truncate();
        DB::table('users')->truncate();

        Classroom::factory(10)->create();
        Speaker::factory(20)->create();
        Student::factory(100)->create();
        Course::factory(40)->create();
        Mark::factory(300)->create();

        $users = [
            [
                "name" => "Nicolas Rauber",
                "email" => "nicolas.rauber@devinci.fr",
                "password" => "nicolas1234",
                "remember_token" => Str::random(10),
                "api_token" => Str::random(30)
            ],
            [
                "name" => "Alexis Bougy",
                "email" => "alexis.bougy@devinci.fr",
                "password" => "alexis1234",
                "remember_token" => Str::random(10),
                "api_token" => Str::random(30)
            ],
            [
                "name" => "Karine Mousdik",
                "email" => "karine.mousdik@devinci.fr",
                "password" => "karine1234",
                "remember_token" => Str::random(10),
                "api_token" => Str::random(30)
            ]

        ];

        foreach ($users as $user){
            User::create([
                "name" => $user["name"],
                "email" => $user["email"],
                "password" =>  password_hash($user["password"], PASSWORD_DEFAULT),
                "remember_token" => $user["remember_token"],
                "api_token" => $user["api_token"]
            ]);
        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
