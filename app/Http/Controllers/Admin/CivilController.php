<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Projects;


class CivilController extends Controller
{
    //
    public function civil_works(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Civil Works')->latest()->get();
        $ccount = Projects::where('project_department','Civil Works')->count();

        return view('admin.civil.civil',compact('currentDateTime','projects','ccount'));
    }

    public function civil_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/civil-works');
    }

    public function civil(){
        $currentDateTime = now();
        $civilcount = Projects::where('project_department','Civil Works')->count();
        $civilprojects = Projects::where('project_department','Civil Works')->latest()->get();

        return view('departments.civil.civil',compact('currentDateTime','civilcount','civilprojects'));
    }


    public function civil_department_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/civil');
    }


    public function civil_share(){
        $currentDateTime = now();
        $civilcount = Projects::where('project_department','Civil Works')->count();
        $civilprojects = Projects::where('project_department','Civil Works')->latest()->get();


        return view('departments.civil.civil_share',compact('currentDateTime','civilcount','civilprojects'));
    }


    public function share_civil_project(Request $request){
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

        return redirect('/civil-share');
    }



    public function civil_backup(){
        $currentDateTime = now();
        $civilcount = Projects::where('project_department','Civil Works Backup')->count();
        $civilprojects = Projects::where('project_department','Civil Works Backup')->latest()->get();


        return view('departments.civil.civil_backup',compact('currentDateTime','civilcount','civilprojects'));
    }


    public function civil_department_forward_share($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/civil-share');
    }


    public function civil_part1(){
        $currentDateTime = now();

        return view('departments.civil.civil_part1',compact('currentDateTime'));
    }


    public function civil_pending(){
        $currentDateTime = now();
        $civilcount = Projects::where('project_department','Civil Works Pending Project')->count();
        $civilprojects = Projects::where('project_department','Civil Works Pending Project')->latest()->get();

        return view('departments.civil.civil_pending',compact('currentDateTime','civilcount','civilprojects'));
    }



    public function pending_civil_project(Request $request){
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

        return redirect('/civil-pending');
    }


    public function civil_department_forward_pending($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/civil-pending');
    }


    public function civil_completed(){
        $currentDateTime = now();
        $civilcount = Projects::where('project_department','Civil Works Completed Project')->count();
        $civilprojects = Projects::where('project_department','Civil Works Completed Project')->latest()->get();

        return view('departments.civil.civil_completed',compact('currentDateTime','civilcount','civilprojects'));
    }


    public function completed_civil_project(Request $request){
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

        return redirect('/civil-completed');
    }


    public function civil_department_forward_completed($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/civil-completed');
    }



    public function civil_filtering(){
        $currentDateTime = now();

        return view('departments.civil.civil_filtering',compact('currentDateTime'));
    }


    public function backup_civil_project(Request $request){
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

        return redirect('/civil-backup');
    }

}

