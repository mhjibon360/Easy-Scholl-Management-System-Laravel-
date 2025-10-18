<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentshiftview()
    {
        $data = StudentShift::orderBy('name', 'asc')->get();
        return view('backend.pages.setup.shift.all-shift', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentshiftadd()
    {
        return view('backend.pages.setup.shift.add-shift');
    }

    /**
     * showadd/create student
     */
    public function studentshiftstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:student_shifts,name',
        ]);

        // store student data into database
        StudentShift::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-shift added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentshiftedit($id)
    {
        // find the data by id
        $shift = StudentShift::findOrFail($id);
        return view('backend.pages.setup.shift.edit-shift', compact('shift'));
    }

    /**
     * showadd/create student
     */
    public function studentshiftupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $id,
        ]);

        // find and update student data into database
        StudentShift::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-shift update success');
        return redirect()->route('setup.student.shift.view');
    }

    /**
     * showadd/create student
     */
    public function studentshiftdelete($id)
    {
        // find and delete student data into database
        StudentShift::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.shift.view');
    }
}
