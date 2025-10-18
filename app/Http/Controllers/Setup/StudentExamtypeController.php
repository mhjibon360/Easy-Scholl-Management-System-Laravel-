<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class StudentExamtypeController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentexamtypeview()
    {
        $data = ExamType::get();
        return view('backend.pages.setup.examtype.all-examtype', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentexamtypeadd()
    {
        return view('backend.pages.setup.examtype.add-examtype');
    }

    /**
     * showadd/create student
     */
    public function studentexamtypestore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:exam_types,name',
        ]);

        // store student data into database
        ExamType::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-examtype added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentexamtypeedit($id)
    {
        // find the data by id
        $examtype = ExamType::findOrFail($id);
        return view('backend.pages.setup.examtype.edit-examtype', compact('examtype'));
    }

    /**
     * showadd/create student
     */
    public function studentexamtypeupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:exam_types,name,' . $id,
        ]);

        // find and update student data into database
        ExamType::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-examtype update success');
        return redirect()->route('setup.student.examtype.view');
    }

    /**
     * showadd/create student
     */
    public function studentexamtypedelete($id)
    {
        // find and delete student data into database
        ExamType::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.examtype.view');
    }
}
