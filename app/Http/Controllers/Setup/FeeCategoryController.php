<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentfeecategoryview()
    {
        $data = FeeCategory::get();
        return view('backend.pages.setup.feecategory.all-feecategory', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentfeecategoryadd()
    {
        return view('backend.pages.setup.feecategory.add-feecategory');
    }

    /**
     * showadd/create student
     */
    public function studentfeecategorystore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:fee_categories,name',
        ]);

        // store student data into database
        FeeCategory::create([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->success('Student-feecategory added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentfeecategoryedit($id)
    {
        // find the data by id
        $feecategory = FeeCategory::findOrFail($id);
        return view('backend.pages.setup.feecategory.edit-feecategory', compact('feecategory'));
    }

    /**
     * showadd/create student
     */
    public function studentfeecategoryupdate(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required|unique:fee_categories,name,' . $id,
        ]);

        // find and update student data into database
        FeeCategory::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-feecategory update success');
        return redirect()->route('setup.student.feecategory.view');
    }

    /**
     * showadd/create student
     */
    public function studentfeecategorydelete($id)
    {
        // find and delete student data into database
        FeeCategory::where('id', $id)->delete();

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.feecategory.view');
    }
}
