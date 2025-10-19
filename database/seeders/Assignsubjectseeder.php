<?php

namespace Database\Seeders;

use App\Models\AssignSubject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Assignsubjectseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Play (class_id = 5)
            ['class_id' => 5, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 0], // English
            ['class_id' => 5, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 0], // Bangla
            ['class_id' => 5, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 0], // Math
            ['class_id' => 5, 'subject_id' => 18, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0], // Drawing
            ['class_id' => 5, 'subject_id' => 19, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0], // Rhymes

            // Nursery (class_id = 6)
            ['class_id' => 6, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 0],
            ['class_id' => 6, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 0],
            ['class_id' => 6, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 0],
            ['class_id' => 6, 'subject_id' => 18, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 6, 'subject_id' => 19, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0],

            // Class 1 (class_id = 7)
            ['class_id' => 7, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 7, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 7, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 7, 'subject_id' => 10, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 7, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 7, 'subject_id' => 13, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 7, 'subject_id' => 14, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0],

            // Class 2 (class_id = 8)
            ['class_id' => 8, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 8, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 8, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 8, 'subject_id' => 10, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 8, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 8, 'subject_id' => 13, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 8, 'subject_id' => 14, 'full_mark' => 50,  'pass_mark' => 17, 'get_mark' => 0],

            // Class 3–5 (class_id = 9–11)
            // Class 3
            ['class_id' => 9, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 9, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 9, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 9, 'subject_id' => 10, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 9, 'subject_id' => 11, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 9, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 9, 'subject_id' => 13, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 9, 'subject_id' => 14, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],

            // Class 4
            ['class_id' => 10, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 10, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 10, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 10, 'subject_id' => 10, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 10, 'subject_id' => 11, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 10, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 10, 'subject_id' => 13, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 10, 'subject_id' => 14, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],

            // Class 5
            ['class_id' => 11, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 11, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 11, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 11, 'subject_id' => 10, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 11, 'subject_id' => 11, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 11, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 11, 'subject_id' => 13, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 11, 'subject_id' => 14, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 11, 'subject_id' => 16, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0], // ICT

            // Class 6–8 (class_id = 12–14)
            ['class_id' => 12, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 12, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 12, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 12, 'subject_id' => 17, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40], // Science
            ['class_id' => 12, 'subject_id' => 11, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 12, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 12, 'subject_id' => 13, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 12, 'subject_id' => 14, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 12, 'subject_id' => 16, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],

            ['class_id' => 13, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 13, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 13, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 13, 'subject_id' => 17, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 13, 'subject_id' => 11, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 13, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 13, 'subject_id' => 16, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 13, 'subject_id' => 13, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],

            ['class_id' => 14, 'subject_id' => 8, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 14, 'subject_id' => 7, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 14, 'subject_id' => 9, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 14, 'subject_id' => 17, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 14, 'subject_id' => 11, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 14, 'subject_id' => 12, 'full_mark' => 100, 'pass_mark' => 33, 'get_mark' => 40],
            ['class_id' => 14, 'subject_id' => 13, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 14, 'subject_id' => 14, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 14, 'subject_id' => 16, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0],
            ['class_id' => 14, 'subject_id' => 15, 'full_mark' => 50, 'pass_mark' => 17, 'get_mark' => 0], // optional
        ];

        AssignSubject::insert($data);
    }
}
