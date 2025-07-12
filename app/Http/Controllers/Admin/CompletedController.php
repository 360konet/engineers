<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CompletedController extends Controller
{
    //
    public function completed_works(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Completed Project')->latest()->get();
        $cocount = Projects::where('project_department','Completed Project')->count();

        return view('admin.completed.completed',compact('currentDateTime','projects','cocount'));
    }

    public function completed_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/completed-works');
    }
}
