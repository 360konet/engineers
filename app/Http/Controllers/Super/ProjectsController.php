<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProjectsController extends Controller
{
    //
    public function new_project(){
        $currentDateTime = now();
        $pcount = Projects::where('project_department','Pending Project')->count();

        $projects = Projects::where('project_department','Pending Project')->latest()->get();

        return view('super.projects',compact('currentDateTime','projects','pcount'));
    }

    public function add_project(Request $request){
        $project = new Projects();

        $project->project_name=$request->input('project_name');
        $project->project_department=$request->input('project_department');
        $project->project_head=$request->input('project_head');
        if ($request->hasFile('project_file')) {
            $file = $request->file('project_file');
            $originalFilename = $file->getClientOriginalName();
        
            $ext = $file->getClientOriginalExtension();
        
            $filename = time() . '_' . $originalFilename;
        
            $file->move('projects', $filename);
        
            $project->project_file = $originalFilename;
            $project->project_file =  $filename;
        }
        $project->save();

        return redirect('/new-project');
    }

    public function view_file($filename){
        $file = storage_path('app/public/projects/' . $filename);
    
        if (file_exists($file)) {
            return response()->download($file, $filename);
        } else {
            abort(404, 'File not found');
        }
    }


    public function pending_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/new-project');
    }

}
