<?php

namespace App\Http\Controllers;

use App\Models\AssignSubject;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    /**
     * get subject
     */
    public function getSubject(Request $request)
   {
        $data = AssignSubject::with(['studentclass','studentsubject'])->where('class_id', $request->class_id)->get();
        return response()->json($data);
    }
}
