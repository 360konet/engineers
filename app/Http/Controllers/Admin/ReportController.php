<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    //
    public function generate_reports(Request $request){
        $currentDateTime = now();
    
        return view('admin.reports.reports', compact('currentDateTime'));
    }

    public function filter_projects(Request $request)
    {
        $currentDateTime = now();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $filteredProjects = Projects::whereBetween('created_at', [$startDate, $endDate])->get();
    
        // Pass the filtered projects directly to the view
        return view('admin.reports.filter', compact('filteredProjects','currentDateTime'));
    }

    


}
