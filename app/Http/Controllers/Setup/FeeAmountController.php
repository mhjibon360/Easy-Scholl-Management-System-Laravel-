<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    /**
     * show/viw all student
     */
    public function studentfeeamountview()
    {
        $data = FeeAmount::with('feecategories')->groupBY('fee_category_id')->select('fee_category_id')->get();
        return view('backend.pages.setup.feeamount.all-feeamount', compact('data'));
    }

    /**
     * showadd/create student
     */
    public function studentfeeamountadd()
    {
        $feecategories = FeeCategory::all();
        $allclasses = StudentClass::all();
        return view('backend.pages.setup.feeamount.add-feeamount', compact(['feecategories', 'allclasses']));
    }

    /**
     * showadd/create student
     */
    public function studentfeeamountstore(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required|string|max:255|unique:fee_categories,name',
        ]);

        $count = count($request->class_id);
        if ($count != Null) {
            for ($i = 0; $i < $count; $i++) {
                $feeamount = new FeeAmount();
                $feeamount->fee_category_id = $request->fee_category_id;
                $feeamount->class_id = $request->class_id[$i];
                $feeamount->amount = $request->amount[$i];
                $feeamount->save();
            }

            // action with notification
            notyf()->info('Fee Category added success');
            return redirect()->route('setup.student.feeamount.view');
        }

        // action with notification
        notyf()->success('Student-feeamount added success');
        return redirect()->back();
    }

    /**
     * edit student
     */
    public function studentfeeamountedit($id)
    {
        // find the data by id
        $feecategories = FeeCategory::all();
        $allclasses = StudentClass::all();
        $feeamount = FeeAmount::with('feecategories')->where('fee_category_id', $id)->get();
        $editData = $feeamount->first();
        return view('backend.pages.setup.feeamount.edit-feeamount', compact(['feeamount', 'feecategories', 'allclasses', 'editData']));
    }

    /**
     * showadd/create student
     */
    public function studentfeeamountupdate(Request $request, $id)
    {

        if ($request->class_id == null) {
            notyf()->error('Sorry you don\'t select any item');
            return redirect()->back();
        } else {

            $feeamount = FeeAmount::where('fee_category_id', $id)->delete();

            $count = count($request->class_id);
            for ($i = 0; $i < $count; $i++) {
                $feeamount = new FeeAmount();
                $feeamount->fee_category_id = $request->fee_category_id;
                $feeamount->class_id = $request->class_id[$i];
                $feeamount->amount = $request->amount[$i];
                $feeamount->save();
            }

            // action with notification
            notyf()->success('Student-feeamount added success');
            return redirect()->back();
        }


        // validate data
        $request->validate([
            'name' => 'required|unique:fee_categories,name,' . $id,
        ]);

        // find and update student data into database
        FeeAmount::where('id', $id)->update([
            'name' => $request->name,
        ]);

        // action with notification
        notyf()->info('Student-feeamount update success');
        return redirect()->route('setup.student.feeamount.view');
    }

    /**
     * showadd/create student
     */
    public function studentfeeamountdetails($id)
    {
        // find and delete student data into database
        $feeamount = FeeAmount::with(['studentclass', 'feecategories'])->where('fee_category_id', $id)->get();
        $details = $feeamount->first();
        return view('backend.pages.setup.feeamount.details-feeamount', compact(['feeamount', 'details']));

        // action with notification
        notyf()->warning('Student-Class delete success');
        return redirect()->route('setup.student.feeamount.view');
    }
}
