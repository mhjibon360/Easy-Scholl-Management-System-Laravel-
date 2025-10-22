<?php

namespace App\Exports;

use App\Models\StudentYear;
use Maatwebsite\Excel\Concerns\FromCollection;

class YearExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentYear::all();
    }
}
