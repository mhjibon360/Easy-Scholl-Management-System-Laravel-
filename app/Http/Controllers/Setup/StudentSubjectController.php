<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentsubjectview()
    {
        $data = StudentSubject::get();
        return view('backend.pages.setup.subject.all-subject', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentsubjectadd()
    {
        return view('backend.pages.setup.subject.add-subject');
    }

    /**
     * showadd/create student
     */
    public function studentsubjectstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:student_subjects,name',
        ]);

        // store student data into database
        StudentSubject::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-subject added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentsubjectedit($id)
    {
        // find the data by id
        $subject = StudentSubject::findOrFail($id);
        return view('backend.pages.setup.subject.edit-subject', compact('subject'));
    }

    /**
     * showadd/create student
     */
    public function studentsubjectupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:student_subjects,name,' . $id,
        ]);

        // find and update student data into database
        StudentSubject::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-subject update success');
        return redirect()->route('setup.student.subject.view');
    }

    /**
     * showadd/create student
     */
    public function studentsubjectdelete($id)
    {
        // find and delete student data into database
        StudentSubject::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.subject.view');
    }
}
