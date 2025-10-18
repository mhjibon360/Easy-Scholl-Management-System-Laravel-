<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsermanageController extends Controller
{
    /**
     * manage user view
     */
    public function manageuser()
    {
        $data = User::orderBy('name', 'asc')->get();
        return view('backend.pages.manage-user.all-user', compact('data'));
    }
    /**
     * create user view
     */
    public function adduser()
    {

        return view('backend.pages.manage-user.add-user');
    }
    /**
     * manage user view
     */
    public function storeuser(Request $request)
    {
        // validate data
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
        ]);

        $code = rand(1000, 9999);

        $user = User::create([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'code' => $code,
            'password' => Hash::make($code),
            'created_at' => now(),
        ]);

        // action with notification
        notyf()->success('Congratulation,Account created success');
        return redirect()->route('manage.user');
    }
    /**
     * edit user
     */
    public function edituser($id)
    {
        $user = User::where('id', $id)->first();
        return view('backend.pages.manage-user.edit-user', compact('user'));
    }
    /**
     * update user
     */
    public function updateuser(Request $request, $id)
    {
        // validate data
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);


        User::where('id', $id)->update([
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => now(),
        ]);

        // action with notification
        notyf()->info('Congratulation,Account update success');
        return redirect()->route('manage.user');
    }

    /**
     * delete user
     */
    public function deleteuser($id)
    {
        $data = User::where('id', $id)->first();
        // unlink image
        if ($data->photo) {
            unlink($data->photo);
        }

        // delete row
        $data->delete();

        // action with notification
        notyf()->warning('Account delete success');
        return redirect()->route('manage.user');
    }
}
