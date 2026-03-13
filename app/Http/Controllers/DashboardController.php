<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
 public function index(){
    $recentEmployees = \App\Models\PersonalInformation::latest('created_at')
        ->take(6)
        ->get()
        ->map(function($info) {
            $other = \App\Models\OtherInformation::where('employee_id', $info->employee_id)->first();
            $info->department_name = $other->department_name ?? 'N/A';
            return $info;
        });

    return view('dashboard.index', compact('recentEmployees'));
}
}
