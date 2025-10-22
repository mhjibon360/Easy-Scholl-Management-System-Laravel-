<?php

namespace App\Http\Controllers\Setup;

use App\Exports\YearExport;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\YearImport;
use Maatwebsite\Excel\Facades\Excel;

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


    /**
     * year import
     */
    public function yearimport()
    {
        return view('backend.pages.setup.year.import-year');
    }

    /**
     * year import store
     */
    public function yearimportstore(Request $request)
    {

        if ($request->hasFile('import_file')) {
            $import_file = $request->file('import_file');
            $name = hexdec(uniqid()) . '.' . $import_file->getClientOriginalExtension();
            $url = "upload/excel/year/" . $name;
            $import_file->move(public_path("upload/excel/year/"), $name);

            Excel::import(new YearImport, $url);
            // action with notification
            notyf()->info('Year list imported success');
            return redirect()->route('setup.student.year.view');
        }
    }


    /**
     * year export
     */
    public function yearexport()
    {
        return Excel::download(new YearExport, 'year.xlsx');
    }
}
