<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Http\Controllers\Controller;

class RollGenerateController extends Controller
{

    /**
     * roll generate
     */

    public function rollgenerate(Request $request)
    {
        $yearid = $request->year_id;
        $classid = $request->class_id;

        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();



        return view('backend.pages.student.roll-generate.show-roll-generate', compact('allclassess', 'allyears', 'yearid', 'classid'));
    }

    /**
     * roll generate result
     */

    public function rollgenerateresult(Request $request)
    {

        $data = AssignStudent::with(['class', 'year', 'group', 'shift', 'student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return view('backend.pages.student.roll-generate.roll-generate-view', compact('data'));
    }

    /**
     * roll generate tore
     */

    public function rollgeneratestore(Request $request)
    {
        $userIds = $request->assignstudent_id;
        $rolls = $request->roll;

        foreach ($userIds as $key => $value) {
            AssignStudent::where('id', $value)->update([
                'roll' => $rolls[$key],
            ]);
        }
        // action with notification
        notyf()->info('Roll generate success');
        return redirect()->back();
    }
}
