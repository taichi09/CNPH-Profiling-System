<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\EmployeePdsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(){
        $employees = \App\Models\PersonalInformation::orderBy('employee_id')->get();
        return view('employees.index', compact('employees'));
    }

    public function create($step = 1)
    {
        return view('employees.create.index', [
            'currentStep' => (int)$step
        ]);
    }

    public function storeStep(Request $request, $step)
    {
        $request->session()->put("employee_step_{$step}", $request->except('_token'));

        if ((int)$step === 8) {
            return redirect()->route('employees.index');
        }

        return redirect()->route('employees.create.step', (int)$step + 1);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xlsm,xls|max:10240',
        ]);

        Excel::import(new EmployeePdsImport, $request->file('file'));

        return back()->with('success', 'All employee data imported successfully.');
    }
}
