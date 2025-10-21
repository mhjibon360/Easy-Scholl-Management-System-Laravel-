<?php

namespace App\Http\Controllers\Setup;

use App\Exports\ClassExport;
use App\Imports\ClassImport;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentview()
    {
        $data = StudentClass::get();
        return view('backend.pages.setup.student.all-student', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentadd()
    {
        return view('backend.pages.setup.student.add-student');
    }

    /**
     * showadd/create student
     */
    public function studentstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:student_classes,name',
        ]);

        // store student data into database
        StudentClass::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-Class added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentedit($id)
    {
        // find the data by id
        $class = StudentClass::findOrFail($id);
        return view('backend.pages.setup.student.edit-student', compact('class'));
    }

    /**
     * showadd/create student
     */
    public function studentupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:student_classes,name,' . $id,
        ]);

        // find and update student data into database
        StudentClass::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-Class update success');
        return redirect()->route('setup.student.class.view');
    }

    /**
     * showadd/create student
     */
    public function studentdelete($id)
    {
        // find and delete student data into database
        StudentClass::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.class.view');
    }

    /**
     * student class import
     */
    public function studentclassimport()
    {
        return view('backend.pages.setup.student.import-student');
    }

    /**
     * student class import store
     */
    public function studentclassimportstore(Request $request)
    {
        return($request->all());
        
        Excel::import(new ClassImport, $request->file('import_file'));
        // action with notification
        notyf()->info('Class Imported Success');
        return redirect()->route('setup.student.class.view');
    }

    /**
     * student class export
     */
    public function studentclassexport()
    {
        return Excel::download(new ClassExport, 'studentclass.xlsx');
    }
}
