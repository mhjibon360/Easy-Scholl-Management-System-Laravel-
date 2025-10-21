<?php

namespace App\Imports;

use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ClassImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row['name']) || empty($row['name'])) {
            return null;
        }

        return new StudentClass([
            'name' => trim($row[0]),
        ]);
    }
}
