<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ElectricalController extends Controller
{
    //
    public function electrical_works(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Electricals')->latest()->get();
        $ecount = Projects::where('project_department','Electricals')->count();

        return view('admin.electrical.electrical',compact('currentDateTime','projects','ecount'));
    }

    public function electricals_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/electrical-works');
    }


    public function electricals(){
        $currentDateTime = now();
        $electcount = Projects::where('project_department','Electricals')->count();
        $electprojects = Projects::where('project_department','Electricals')->latest()->get();

        return view('departments.electricals.electricals',compact('currentDateTime','electcount','electprojects'));

    }


    public function electricals_department_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/electricals');
    }


    public function electricals_share(){
        $currentDateTime = now();
        $electcount = Projects::where('project_department','Electricals')->count();
        $electprojects = Projects::where('project_department','Electricals')->latest()->get();

        return view('departments.electricals.electricals_share',compact('currentDateTime','electcount','electprojects'));
    }


    public function share_electricals_project(Request $request){
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

        return redirect('/electricals-share');
    }



    public function electricals_backup(){
        $currentDateTime = now();
        $electcount = Projects::where('project_department','Electricals Backup')->count();
        $electprojects = Projects::where('project_department','Electricals Backup')->latest()->get();


        return view('departments.electricals.electricals_backup',compact('currentDateTime','electcount','electprojects'));
    }


    public function electricals_department_forward_share($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/electricals-share');
    }


    public function electricals_part1(){
        $currentDateTime = now();

        return view('departments.electricals.electricals_part1',compact('currentDateTime'));
    }


    public function electricals_pending(){
        $currentDateTime = now();
        $electcount = Projects::where('project_department','Electricals Pending Project')->count();
        $electprojects = Projects::where('project_department','Electricals Pending Project')->latest()->get();

        return view('departments.electricals.electricals_pending',compact('currentDateTime','electcount','electprojects'));
    }



    public function pending_electricals_project(Request $request){
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

        return redirect('/electricals-pending');
    }


    public function electricals_department_forward_pending($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/electricals-pending');
    }


    public function electricals_completed(){
        $currentDateTime = now();
        $electcount = Projects::where('project_department','Electricals Completed Project')->count();
        $electprojects = Projects::where('project_department','Electricals Completed Project')->latest()->get();

        return view('departments.electricals.electricals_completed',compact('currentDateTime','electcount','electprojects'));
    }


    public function completed_electricals_project(Request $request){
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

        return redirect('/electricals-completed');
    }


    public function electricals_department_forward_completed($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/electricals-completed');
    }



    public function electricals_filtering(){
        $currentDateTime = now();

        return view('departments.electricals.electricals_filtering',compact('currentDateTime'));
    }


    public function backup_electricals_project(Request $request){
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

        return redirect('/electricals-backup');
    }

}

