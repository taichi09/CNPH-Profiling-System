<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\AllSheetsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(){
        return view('employees.index');
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
            'file' => 'required|mimes:xlsx,xls|max:2048'
        ]);

        Excel::import(new AllSheetsImport, $request->file('file'));

        return redirect()->route('employees.index')
            ->with('success', 'Employees imported successfully!');
    }
}
