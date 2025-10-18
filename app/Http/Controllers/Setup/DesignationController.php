<?php

namespace App\Http\Controllers\Setup;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentdesignationview()
    {
        $data = Designation::get();
        return view('backend.pages.setup.designation.all-designation', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentdesignationadd()
    {
        return view('backend.pages.setup.designation.add-designation');
    }

    /**
     * showadd/create student
     */
    public function studentdesignationstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:designations,name',
        ]);

        // store student data into database
        Designation::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-designation added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentdesignationedit($id)
    {
        // find the data by id
        $designation = Designation::findOrFail($id);
        return view('backend.pages.setup.designation.edit-designation', compact('designation'));
    }

    /**
     * showadd/create student
     */
    public function studentdesignationupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:designations,name,' . $id,
        ]);

        // find and update student data into database
        Designation::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-designation update success');
        return redirect()->route('setup.student.designation.view');
    }

    /**
     * showadd/create student
     */
    public function studentdesignationdelete($id)
    {
        // find and delete student data into database
        Designation::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.designation.view');
    }
}
