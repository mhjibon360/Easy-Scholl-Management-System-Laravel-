<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentSubject;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackendController extends Controller
{
    /**
     * admin dashboard
     */
    public function index()
    {
        $data['teachers'] = User::where('usertype', 'employee')->count();
        $data['students'] = User::where('usertype', 'student')->count();
        $data['classes'] = StudentClass::count();
        $data['groups'] = StudentGroup::count();
        $data['shifts'] = StudentShift::count();
        $data['subjects'] = StudentSubject::count();
        $data['recentstudents'] = User::with('assignstudent.year', 'assignstudent.class')->where('usertype', 'student')->latest()->take(20)->get();
        // return ($data);
        return view('backend.pages.dashboard.index', $data);
    }

    /**
     * edit profile
     */
    public function edit()
    {
        $data['alldesignations'] = Designation::all();
        return view('backend.pages.profile.index', $data);
    }

    /**
     * update profile data
     */
    public function update(Request $request)
    {
        // get the auth user
        $data = User::where('id', $request->id)->first();

        // validate data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email,' . $request->id
        ]);

        // getting profile photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $name = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path("upload/profile/"), $name);
            $url = "upload/profile/" . $name;
            // unlink old one
            if (file_exists($data->photo)) {
                unlink($data->photo);
            }
        }

        // update data
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'photo' => isset($url) ? $url : $data->photo,
            'updated_at' => now(),
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'fname' => $request->fname,
            'designation_id' => $request->designation_id,
            'mname' => $request->mname,
            'religion' => $request->religion,
            'dob' => $request->dob,
        ]);

        // action with notification
        notyf()->info('Profile update success');
        return redirect()->route('edit.profile');
    }

    /**
     * update password
     */
    public function changepassword(Request $request)
    {
        // get the auth user data
        $data = User::where('id', $request->id)->first();

        // checking,matching and update old one
        if (Hash::check($request->password, $data->password)) {
            $data->update([
                'password' => Hash::make($request->new_password),
            ]);
            // action with notification
            notyf()->info('Password change success');
            return redirect()->route('edit.profile');
        } else {
            // action with notification
            notyf()->error('Something wrong,please check and try again');
            return redirect()->route('edit.profile');
        }
    }
}
