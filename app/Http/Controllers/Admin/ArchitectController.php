<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Help;
use App\Models\Part1;


class ArchitectController extends Controller
{
    //
    public function architect_works(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Architect')->latest()->get();
        $acount = Projects::where('project_department','Architect')->count();

        return view('admin.architect.architect',compact('currentDateTime','projects','acount'));
    }

    
    public function architect_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/architect-works');
    }


    public function architect(){
        $currentDateTime = now();
        $arcount = Projects::where('project_department','Architect')->count();
        $arprojects = Projects::where('project_department','Architect')->latest()->get();
        $arbackup = Projects::where('project_department','Architect Backup')->count();
        $arcompleted = Projects::where('project_department','Architect Completed Project')->count();

        return view('departments.architect.architect',compact('currentDateTime','arcount','arprojects','arbackup','arcompleted'));
    }


    public function architect_department_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/architect');
    }


    public function architect_share(){
        $currentDateTime = now();
        $arcount = Projects::where('project_department','Architect')->count();
        $arprojects = Projects::where('project_department','Architect')->latest()->get();


        return view('departments.architect.architect_share',compact('currentDateTime','arcount','arprojects'));
    }


    public function share_architect_project(Request $request){
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

        return redirect('/architect-share');
    }



    public function architect_backup(){
        $currentDateTime = now();
        $arcount = Projects::where('project_department','Architect Backup')->count();
        $arprojects = Projects::where('project_department','Architect Backup')->latest()->get();


        return view('departments.architect.architect_backup',compact('currentDateTime','arcount','arprojects'));
    }


    public function architect_department_forward_share($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/architect-share');
    }


    public function architect_part1(){
        $currentDateTime = now();

        return view('departments.architect.architect_part1',compact('currentDateTime'));
    }


    public function architect_pending(){
        $currentDateTime = now();
        $arcount = Projects::where('project_department','Architect Pending Project')->count();
        $arprojects = Projects::where('project_department','Architect Pending Project')->latest()->get();

        return view('departments.architect.architect_pending',compact('currentDateTime','arcount','arprojects'));
    }



    public function pending_architect_project(Request $request){
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

        return redirect('/architect-pending');
    }


    public function architect_department_forward_pending($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/architect-pending');
    }


    public function architect_completed(){
        $currentDateTime = now();
        $arcount = Projects::where('project_department','Architect Completed Project')->count();
        $arprojects = Projects::where('project_department','Architect Completed Project')->latest()->get();

        return view('departments.architect.architect_completed',compact('currentDateTime','arcount','arprojects'));
    }


    public function completed_architect_project(Request $request){
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

        return redirect('/architect-completed');
    }


    public function architect_department_forward_completed($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/architect-completed');
    }



    public function architect_filtering(){
        $currentDateTime = now();

        return view('departments.architect.architect_filtering',compact('currentDateTime'));
    }


    public function backup_architect_project(Request $request){
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

        return redirect('/architect-backup');
    }


    public function help_architect(){
        $currentDateTime = now();
        $help = Help::where('department','admin')->latest()->get();

        return view('departments.architect.architect_help',compact('currentDateTime','help'));
    }


    public function help_architect_submit(Request $request){
        $help = new Help();
        
        $help->name=$request->input('name');
        $help->service=$request->input('service');
        $help->department=$request->input('department');
        $help->email=$request->input('email');
        $help->message=$request->input('message');
        $help->save();

        return redirect('/help-architect');
    }


    
}
