<?php

namespace App\Http\Controllers\Mark;

use App\Models\ExamType;
use App\Models\StudentYear;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Http\Controllers\Controller;
use App\Models\StudentMark;
use App\Models\User;

class StudentMarkController extends Controller
{
    /**
     * mark show view
     */
    public function markshow(Request $request)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();
        $examtypes = ExamType::get();
        return view('backend.pages.student.mark.manage-mark', compact('allclassess', 'allyears', 'examtypes'));
    }

    /**
     * find mark
     */

    public function markfind(Request $request)
    {
        $data = AssignStudent::with(['class', 'year', 'group', 'shift', 'student', 'discount', 'studentmark'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        // return($data);
        return view('backend.pages.pdf.marrk-entry', compact('data'));
    }

    /**
     * store mark
     */
    public function markstore(Request $request)
    {

        $marks = $request->mark;
        foreach ($marks as $key => $value) {
            StudentMark::create([
                'student_id' => $request->student_id[$key],
                'id_no' => $request->id_no[$key],
                'year_id' => $request->year_id,
                'class_id' => $request->class_id,
                'assign_subject_id' => $request->assign_subject_id,
                'exam_type_id' => $request->exam_type_id,
                'mark' => $value,
            ]);
        }

        // action with notification
        notyf()->info('Mark Entry success');
        return redirect()->back();
    }

    /**
     * mark edit view
     */
    public function markedit(Request $request)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();
        $examtypes = ExamType::get();
        return view('backend.pages.student.mark.edit-mark', compact('allclassess', 'allyears', 'examtypes'));
    }

    /**
     * edit mark find
     */

    public function markeditfind(Request $request)
    {

        $data = StudentMark::with(['assignsubject', 'examtype', 'year',  'class', 'student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)
            ->where('assign_subject_id', $request->assign_subject_id)->where('exam_type_id', $request->exam_type_id)->get();
        // return ($data);
        return view('backend.pages.pdf.marrk-entry', compact('data'));
    }

    /**
     * edit mark update
     */
    public function markeditupdate(Request $request)
    {
        $marks = $request->mark;

        foreach ($marks as $key => $value) {
            StudentMark::where([
                'student_id' => $request->student_id[$key],
                'id_no' => $request->id_no[$key],
                'year_id' => $request->year_id,
                'class_id' => $request->class_id,
                'assign_subject_id' => $request->assign_subject_id,
                'exam_type_id' => $request->exam_type_id,
            ])->update([
                'mark' => $value,
            ]);
        }

        notyf()->info('Mark Entry updated successfully');
        return redirect()->back();
    }
}
