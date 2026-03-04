<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
 public function index()
{
    $departments = Department::paginate(10);
    return view('departments.index', compact('departments'));
}
public function update(Request $request, Department $department)
{
  $validated = $request->validate([
    'department_name' => 'required|string|max:255|unique:department,dept_name,' 
        . $department->dept_id . ',dept_id',
]);

    $department->update(['dept_name' => $validated['department_name']]);

    return response()->json(['success' => true, 'message' => 'Department updated successfully.']);
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
