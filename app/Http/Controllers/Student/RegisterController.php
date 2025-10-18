<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Designation;
use App\Models\FeeCategory;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * student account list
     */
    public function studentaccountlist(Request $request)
    {

        $yearid = $request->year_id;
        $classid = $request->class_id;

        $allclassess = StudentClass::all();
        $allyears = StudentYear::latest()->get();

        if ($request->filled('year_id')) {
            $data = AssignStudent::with(['class', 'year', 'group', 'shift', 'student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        } else {
            $data = AssignStudent::with(['class', 'year', 'group', 'shift', 'student'])->get();
        }

        return view('backend.pages.student.account.all-student', compact('data', 'allclassess', 'allyears', 'yearid', 'classid'));
    }


    /**
     * student account create view
     */
    public function studentaccountcreate()
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::all();
        $allgroups = StudentGroup::all();
        $allshifts = StudentShift::all();
        $allfees = FeeCategory::all();
        return view('backend.pages.student.account.add-student', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees']));
    }

    /**
     * student account store
     */
    public function studentaccountstore(Request $request)
    {
        $year = StudentYear::where('id', $request->year_id)->first();
        $rancode = $year->name . rand(00, 99);
        $request->validate([
            'email' => 'required|unique:users,email'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $name = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path("upload/profile/"), $name);
            $url = "upload/profile/" . $name;
        }

        $code = rand(0000, 9999);
        $user = User::create([
            'usertype' => 'student',
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $url,
            'password' => Hash::make($code),
            'mobile' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'religion' => $request->religion,
            'id_no' => $rancode,
            'dob' => $request->dob,
            'code' => $code,
            'role' => $request->role,
        ]);

        $assignstudent = AssignStudent::create([
            'student_id' => $user->id,
            // 'roll' => $request->roll,
            'class_id' => $request->class_id,
            'year_id' => $request->year_id,
            'group_id' => $request->group_id,
            'shift_id' => $request->shift_id,
        ]);

        // discount student
        DiscountStudent::create([
            'assign_student_id' => $assignstudent->id,
            'fee_category_id' => $request->fee_category_id,
            'discount' => $request->discount,
        ]);

        // action with notification
        notyf()->info('Student Registration success');
        return redirect()->route('student.account.list');
    }

    /**
     * student account edit
     */
    public function studentaccountedit($id)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::all();
        $allgroups = StudentGroup::all();
        $allshifts = StudentShift::all();
        $allfees = FeeCategory::all();
        $data = User::with('assignstudent.discount.feecategory')->where('id', $id)->first();
        // return($data);
        return view('backend.pages.student.account.edit-student', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees', 'data']));
    }

    /**
     * student account update
     */
    public function studentaccountupdate(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $year = StudentYear::findOrFail($request->year_id);
        $rancode = $year->name . rand(00, 99);

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Handle profile photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $name = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/profile/'), $name);
            $url = 'upload/profile/' . $name;

            // Delete old photo if exists
            if (file_exists($data->photo)) {
                unlink($data->photo);
            }
        }

        // Update user info
        $data->update([
            'usertype' => 'student',
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $url ?? $data->photo,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'religion' => $request->religion,
            'id_no' => $rancode,
            'dob' => $request->dob,
            'code' => rand(1000, 9999),
            'role' => $request->role,
        ]);

        // Find assign student record
        $assignstudent = AssignStudent::where('student_id', $id)->first();
        if ($assignstudent) {
            $assignstudent->update([
                'class_id' => $request->class_id,
                'year_id' => $request->year_id,
                'group_id' => $request->group_id,
                'shift_id' => $request->shift_id,
            ]);

            // Update discount record
            DiscountStudent::where('assign_student_id', $assignstudent->id)->update([
                'fee_category_id' => $request->fee_category_id,
                'discount' => $request->discount,
            ]);
        }

        notyf()->info('Student Registration Updated Successfully');
        return redirect()->route('student.account.list');
    }


    /**
     * student account delete
     */
    public function studentaccountdelete($id) {}


    /**
     * student account edit
     */
    public function studentaccountpromotion($id)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::all();
        $allgroups = StudentGroup::all();
        $allshifts = StudentShift::all();
        $allfees = FeeCategory::all();
        $data = User::with('assignstudent.discount.feecategory')->where('id', $id)->first();
        // return($data);
        return view('backend.pages.student.account.promotion-student', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees', 'data']));
    }

    /**
     * account promotion store
     */
    public function studentaccountpromotionstore(Request $request, $id)
    {

        $data = User::findOrFail($id);

        $year = StudentYear::where('id', $request->year_id)->first();
        $rancode = $year->name . rand(00, 99);
        $request->validate([
            'email' => 'required|unique:users,email,' . $id
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $name = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path("upload/profile/"), $name);
            $url = "upload/profile/" . $name;
            // Delete old photo if exists
            if (file_exists($data->photo)) {
                unlink($data->photo);
            }
        }

        $code = rand(0000, 9999);
        $data->update([
            'usertype' => 'student',
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $url ?? $data->photo,
            'password' => Hash::make($code),
            'mobile' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'religion' => $request->religion,
            'id_no' => $rancode,
            'dob' => $request->dob,
            'code' => $code,
            'role' => $request->role,
        ]);

        $assignstudent = AssignStudent::create([
            'student_id' => $id,
            'class_id' => $request->class_id,
            'year_id' => $request->year_id,
            'group_id' => $request->group_id,
            'shift_id' => $request->shift_id,
        ]);

        // discount student
        DiscountStudent::create([
            'assign_student_id' => $assignstudent->id,
            'fee_category_id' => $request->fee_category_id,
            'discount' => $request->discount,
        ]);

        // action with notification
        notyf()->info('Student promotion success');
        return redirect()->route('student.account.list');
    }

    /**
     * student account view
     */
    public function studentaccountview($id)
    {
        $allclassess = StudentClass::all();
        $allyears = StudentYear::all();
        $allgroups = StudentGroup::all();
        $allshifts = StudentShift::all();
        $allfees = FeeCategory::all();
        $data = User::with('assignstudent.discount.feecategory')->where('id', $id)->first();
        // return($data);
        // return view('backend.pages.pdf.sdudent-registration', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees', 'data']));



        $pdf = Pdf::loadView('backend.pages.pdf.sdudent-registration', compact(['allclassess', 'allyears', 'allgroups', 'allshifts', 'allfees', 'data']));
        return $pdf->stream();
    }

}
