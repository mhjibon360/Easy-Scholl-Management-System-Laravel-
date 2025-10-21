<?php

namespace App\Exports;

use App\Models\StudentClass;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClassExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentClass::all();
    }
}
