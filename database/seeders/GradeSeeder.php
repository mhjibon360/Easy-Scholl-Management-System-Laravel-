<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('student_grades')->insert([
            [
                'grade_name'   => 'A+',
                'grade_point'  => 5.00,
                'start_marks'  => 80,
                'end_marks'    => 100,
                'start_point'  => 5.00,
                'end_point'    => 5.00,
                'remarks'      => 'Excellent',
                'created_at'   => Carbon::now(),
            ],
            [
                'grade_name'   => 'A',
                'grade_point'  => 4.00,
                'start_marks'  => 70,
                'end_marks'    => 79,
                'start_point'  => 4.00,
                'end_point'    => 4.99,
                'remarks'      => 'Very Good',
                'created_at'   => Carbon::now(),
            ],
            [
                'grade_name'   => 'A-',
                'grade_point'  => 3.50,
                'start_marks'  => 60,
                'end_marks'    => 69,
                'start_point'  => 3.50,
                'end_point'    => 3.99,
                'remarks'      => 'Good',
                'created_at'   => Carbon::now(),
            ],
            [
                'grade_name'   => 'B',
                'grade_point'  => 3.00,
                'start_marks'  => 50,
                'end_marks'    => 59,
                'start_point'  => 3.00,
                'end_point'    => 3.49,
                'remarks'      => 'Satisfactory',
                'created_at'   => Carbon::now(),
            ],
            [
                'grade_name'   => 'C',
                'grade_point'  => 2.00,
                'start_marks'  => 40,
                'end_marks'    => 49,
                'start_point'  => 2.00,
                'end_point'    => 2.99,
                'remarks'      => 'Average',
                'created_at'   => Carbon::now(),
            ],
            [
                'grade_name'   => 'D',
                'grade_point'  => 1.00,
                'start_marks'  => 33,
                'end_marks'    => 39,
                'start_point'  => 1.00,
                'end_point'    => 1.99,
                'remarks'      => 'Passed',
                'created_at'   => Carbon::now(),
            ],
            [
                'grade_name'   => 'F',
                'grade_point'  => 0.00,
                'start_marks'  => 0,
                'end_marks'    => 32,
                'start_point'  => 0.00,
                'end_point'    => 0.99,
                'remarks'      => 'Fail',
                'created_at'   => Carbon::now(),
            ],
        ]);
    }
}
