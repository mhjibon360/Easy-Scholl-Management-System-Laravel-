<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\FeeCategory;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class RegistrationfeeController extends Controller
{
    /**
     * roll generate
     */

    public function registrationfegenerate(Request $request)
    {
        $yearid = $request->year_id;
        $classid = $request->class_id;
        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();
        return view('backend.pages.student.registration-fee.registration-fee-generate', compact('allclassess', 'allyears', 'yearid', 'classid'));
    }

    /**
     * roll generate result
     */

    public function registrationfegenerateresult(Request $request)
    {

        // return ($request->all());

        $data = AssignStudent::with(['class', 'year', 'group', 'shift', 'student', 'discount'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        // return($data);
        return view('backend.pages.student.registration-fee.registration-fee-view', compact('data'));
    }

    /**
     * roll generate tore
     */

    public function registrationfegeneratestore(Request $request, $id)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::all();
        $allgroups = StudentGroup::all();
        $allshifts = StudentShift::all();
        $allfees = FeeCategory::all();
        $data = User::with('assignstudent.discount.feecategory','assignstudent.year','assignstudent.class')->where('id', $id)->first();
        // return($data);
        // return view('backend.pages.pdf.sdudent-registration-fee', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees', 'data']));



        $pdf = Pdf::loadView('backend.pages.pdf.sdudent-registration-fee', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees', 'data']));
        $pdf->setPaper([0, 0, 595, 1200]);
        return $pdf->stream();
    }
}
