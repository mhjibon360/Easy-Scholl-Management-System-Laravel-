<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentgroupview()
    {
        $data = StudentGroup::orderBy('name','asc')->get();
        return view('backend.pages.setup.group.all-group', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentgroupadd()
    {
        return view('backend.pages.setup.group.add-group');
    }

    /**
     * showadd/create student
     */
    public function studentgroupstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:student_groups,name',
        ]);

        // store student data into database
        StudentGroup::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-group added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentgroupedit($id)
    {
        // find the data by id
        $group = StudentGroup::findOrFail($id);
        return view('backend.pages.setup.group.edit-group', compact('group'));
    }

    /**
     * showadd/create student
     */
    public function studentgroupupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:student_groups,name,' . $id,
        ]);

        // find and update student data into database
        StudentGroup::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-group update success');
        return redirect()->route('setup.student.group.view');
    }

    /**
     * showadd/create student
     */
    public function studentgroupdelete($id)
    {
        // find and delete student data into database
        StudentGroup::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.group.view');
    }
}
