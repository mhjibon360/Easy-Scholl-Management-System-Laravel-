<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentyearview()
    {
        $data = StudentYear::get();
        return view('backend.pages.setup.year.all-year', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentyearadd()
    {
        return view('backend.pages.setup.year.add-year');
    }

    /**
     * showadd/create student
     */
    public function studentyearstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:student_years,name',
        ]);

        // store student data into database
        StudentYear::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-year added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentyearedit($id)
    {
        // find the data by id
        $year = StudentYear::findOrFail($id);
        return view('backend.pages.setup.year.edit-year', compact('year'));
    }

    /**
     * showadd/create student
     */
    public function studentyearupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:student_years,name,' . $id,
        ]);

        // find and update student data into database
        StudentYear::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-year update success');
        return redirect()->route('setup.student.year.view');
    }

    /**
     * showadd/create student
     */
    public function studentyeardelete($id)
    {
        // find and delete student data into database
        StudentYear::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.year.view');
    }
}
