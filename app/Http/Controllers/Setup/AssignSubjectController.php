<?php

namespace App\Http\Controllers\Setup;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Http\Controllers\Controller;
use App\Models\StudentSubject;

class AssignSubjectController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentassignsubjectview()
    {
        $data = AssignSubject::with('studentclass')->groupBY('class_id')->select('class_id')->get();
        // return($data);
        return view('backend.pages.setup.assignsubject.all-assignsubject', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentassignsubjectadd()
    {
        $allsubjects = StudentSubject::all();
        $allclasses = StudentClass::all();
        return view('backend.pages.setup.assignsubject.add-assignsubject', compact(['allsubjects', 'allclasses']));
    }

    /**
     * showadd/create student
     */
    public function studentassignsubjectstore(Request $request)
    {
        $count = count($request->subject_id);
        if ($count != Null) {
            for ($i = 0; $i < $count; $i++) {
                $assignsubject = new AssignSubject();
                $assignsubject->class_id = $request->class_id;
                $assignsubject->subject_id = $request->subject_id[$i];
                $assignsubject->full_mark = $request->full_mark[$i];
                $assignsubject->pass_mark = $request->pass_mark[$i];
                $assignsubject->get_mark = $request->get_mark[$i];
                $assignsubject->created_at = now();
                $assignsubject->save();
            }

            // action with notification
            notyf()->info('Subject assign success');
            return redirect()->route('setup.student.assignsubject.view');
        }
    }

    /**
     * edit student
     */
    public function studentassignsubjectedit($id)
    {
        // find the data by id
        $allsubjects = StudentSubject::all();
        $allclasses = StudentClass::all();
        $assignsubjects = AssignSubject::with(['studentclass', 'studentsubject'])->where('class_id', $id)->get();
        $editData = $assignsubjects->first();
        // return($editData);
        return view('backend.pages.setup.assignsubject.edit-assignsubject', compact(['allsubjects', 'allclasses', 'assignsubjects', 'editData']));
    }

    /**
     * showadd/create student
     */
    public function studentassignsubjectupdate(Request $request, $id)
    {
        if ($request->subject_id == null) {
            notyf()->error('Sorry, you did not select any subject.');
            return redirect()->back();
        } else {
            // delete previous subjects for this class
            AssignSubject::where('class_id', $id)->delete();

            $count = count($request->subject_id);

            for ($i = 0; $i < $count; $i++) {
                $assignsubject = new AssignSubject();
                $assignsubject->class_id = $request->class_id; // same class for all
                $assignsubject->subject_id = $request->subject_id[$i];
                $assignsubject->full_mark = $request->full_mark[$i];
                $assignsubject->pass_mark = $request->pass_mark[$i];
                $assignsubject->get_mark = $request->get_mark[$i];
                $assignsubject->updated_at = now();
                $assignsubject->save();
            }

            notyf()->success('Student assigned subjects updated successfully.');
            return redirect()->route('setup.student.assignsubject.view');
        }
    }


    /**
     * showadd/create student
     */
    public function studentassignsubjectdetails($id)
    {
        // find and delete student data into database
        $assignsubjects = AssignSubject::with(['studentclass', 'studentsubject'])->where('class_id', $id)->get();
        $details = $assignsubjects->first();
        // return($assignsubjects);
        return view('backend.pages.setup.assignsubject.details-assignsubject', compact(['assignsubjects', 'details']));


    }
}
