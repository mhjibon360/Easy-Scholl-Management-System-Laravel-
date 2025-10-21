<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentgradeview()
    {
        $data = StudentGrade::get();
        return view('backend.pages.student.grade.all-grade', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentgradeadd()
    {
        return view('backend.pages.student.grade.add-grade');
    }

    /**
     * showadd/create student
     */
    public function studentgradestore(Request $request)
    {

        // store student data into database
        StudentGrade::create([
            'grade_name' => $request->grade_name,
            'grade_point' => $request->grade_point,
            'start_marks' => $request->start_marks,
            'end_marks' => $request->end_marks,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'remarks' => $request->remarks,
        ]);

        // action with notification
        notyf()->success('Student-grade added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentgradeedit($id)
    {
        // find the data by id
        $grade = StudentGrade::findOrFail($id);
        return view('backend.pages.student.grade.edit-grade', compact('grade'));
    }

    /**
     * showadd/create student
     */
    public function studentgradeupdate(Request $request, $id)
    {


        // find and update student data into database
        StudentGrade::where('id', $id)->update([
            'grade_name' => $request->grade_name,
            'grade_point' => $request->grade_point,
            'start_marks' => $request->start_marks,
            'end_marks' => $request->end_marks,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'remarks' => $request->remarks,
        ]);

        // action with notification
        notyf()->info('Student-grade update success');
        return redirect()->route('student.student.grade.view');
    }

    /**
     * showadd/create student
     */
    public function studentgradedelete($id)
    {
        // find and delete student data into database
        StudentGrade::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('student.student.grade.view');
    }
}
