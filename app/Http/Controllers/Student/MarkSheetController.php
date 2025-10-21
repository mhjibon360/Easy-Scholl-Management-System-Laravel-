<?php

namespace App\Http\Controllers\Student;

use App\Models\ExamType;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentMark;

class MarkSheetController extends Controller
{


    public function studentmarksheetcreate(Request $request)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();
        $examtypes = ExamType::get();
        return view('backend.pages.student.marksheet.manage-marksheet', compact('allclassess', 'allyears', 'examtypes'));
    }

    /**
     * mark sheet find
     */
    public function studentmarksheetfind(Request $request)
    {

        $data = StudentMark::with(['examtype', 'year', 'class', 'student.assignstudent.group', 'assignsubject.studentsubject'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('exam_type_id', $request->exam_type_id)->where('id_no', $request->id_no)->get();
        $grades = StudentGrade::all();
        // return($request->all());

        return view('backend.pages.student.marksheet.view-marksheet', compact('data', 'grades'));
    }
}
