<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssignStudentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $now = Carbon::now();
        $assignStudentsData = [];

        for ($i = 1; $i <= 37; $i++) {
            $classId = rand(5, 14);

            $yearId = rand(4, 10);

            $groupId = rand(1, 3);

            $shiftId = rand(4, 6);

            $assignStudentsData[] = [
                'student_id' => $i,
                'class_id'   => $classId,
                'year_id'    => $yearId,
                'group_id'   => $groupId,
                'shift_id'   => $shiftId,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('assign_students')->insert($assignStudentsData);
    }
}
