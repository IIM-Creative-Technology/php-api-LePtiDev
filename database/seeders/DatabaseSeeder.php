<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Mark;
use App\Models\Speaker;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        Classroom::factory(10)->create();
        Speaker::factory(20)->create();
        Student::factory(100)->create();
        Course::factory(40)->create();
        Mark::factory(300)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
