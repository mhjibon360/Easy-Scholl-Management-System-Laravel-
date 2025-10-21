<?php

namespace App\Http\Controllers\Student;

use App\Models\StudentMark;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class IdCardController extends Controller
{
    public function studentidcardcreate(Request $request)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();
        return view('backend.pages.student.idcard.manage-idcard', compact('allclassess', 'allyears'));
    }

    /**
     * mark sheet find
     */
    public function studentidcardfind(Request $request)
    {
        // return ($request->all());

        // $data = StudentMark::with(['examtype', 'year', 'class', 'student.assignstudent.group', 'assignsubject.studentsubject'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('exam_type_id', $request->exam_type_id)->where('id_no', $request->id_no)->get();

        $data = AssignStudent::with(['student', 'class', 'year', 'group', 'shift', 'discount', 'feecategory', 'studentmark'])->where('class_id', $request->class_id)->where('year_id', $request->year_id)->get();
        $pdf = Pdf::loadView('backend.pages.pdf.student-idcard', compact('data'));
        return $pdf->stream('invoice.pdf');

        // return ($data);




        // return view('backend.pages.pdf.student-idcard', compact('data'));
    }
}
