<?php

namespace App\Imports;

use App\Models\StudentYear;
use Maatwebsite\Excel\Concerns\ToModel;

class YearImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row[0]) || trim($row[0]) === '') {
            return null;
        }

        return new StudentYear([
            'name'     => $row[0],
        ]);
    }
}
