<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $recentEmployees = \App\Models\PersonalInformation::latest('created_at')
            ->take(6)
            ->get()
            ->map(function($info) {
                $other = \App\Models\OtherInformation::where('employee_id', $info->employee_id)->first();
                $info->department_name = $other->department_name ?? 'N/A';
                return $info;
            });

        $employeeCount = \App\Models\PersonalInformation::count();
        $permanentCount = \App\Models\OtherInformation::where('employment_status', 'Permanent')->count();
        $JobOrderCount = \App\Models\OtherInformation::where('employment_status', 'Job Order')->count();
        $casualCount = \App\Models\OtherInformation::where('employment_status', 'Casual')->count();
        // Group employees by department from other_information
        $departmentData = \App\Models\OtherInformation::selectRaw('department_name, COUNT(*) as count')
            ->whereNotNull('department_name')
            ->groupBy('department_name')
            ->orderBy('count', 'desc')
            ->get();

        $departmentLabels = $departmentData->pluck('department_name');
        $departmentCounts = $departmentData->pluck('count');

        return view('dashboard.index', compact(
            'recentEmployees', 'employeeCount', 'permanentCount', 'JobOrderCount',
            'departmentLabels', 'departmentCounts', 'casualCount'
        ));
    }
}
