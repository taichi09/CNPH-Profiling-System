<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index(){
        return view('departments.index');
    }

    public function store(Request $request)


{

    
    $request->validate([
        'department_name' => 'required|string|max:255',
    ]);

    Department::create([
        'dept_name' => $request->department_name,
        'emp_no'    => 0,
    ]);

    return response()->json(['success' => true, 'message' => 'Department added successfully.']);
}
}
