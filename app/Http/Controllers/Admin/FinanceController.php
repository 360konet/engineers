<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FinanceController extends Controller
{
    //
    public function finance(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Finance')->latest()->get();
        $fcount = Projects::where('project_department','Finance')->count();

        return view('admin.finance.finance',compact('currentDateTime','projects','fcount'));
    }


    public function finance_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/finance');
    }


    public function finances(){
        $currentDateTime = now();
        $fcount = Projects::where('project_department','Finance')->count();
        $fprojects = Projects::where('project_department','Finance')->latest()->get();

        return view('departments.finance.finance',compact('currentDateTime','fcount','fprojects'));
    }


    public function architect_department_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/finances');
    }


    public function finances_share(){
        $currentDateTime = now();
        $fcount = Projects::where('project_department','Finance')->count();
        $fprojects = Projects::where('project_department','Finance')->latest()->get();


        return view('departments.finance.finance_share',compact('currentDateTime','fcount','fprojects'));
    }


    public function share_finances_project(Request $request){
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

        return redirect('/finances-share');
    }



    public function finances_backup(){
        $currentDateTime = now();
        $fcount = Projects::where('project_department','Finance Backup')->count();
        $fprojects = Projects::where('project_department','Finance Backup')->latest()->get();

        return view('departments.finance.finance_backup',compact('currentDateTime','fcount','fprojects'));
    }


    public function finances_department_forward_share($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/finances-share');
    }


    public function finances_part1(){
        $currentDateTime = now();

        return view('departments.finance.finance_part1',compact('currentDateTime'));
    }


    public function finances_pending(){
        $currentDateTime = now();
        $fcount = Projects::where('project_department','Finance Pending Project')->count();
        $fprojects = Projects::where('project_department','Finance Pending Project')->latest()->get();

        return view('departments.finance.finance_pending',compact('currentDateTime','fcount','fprojects'));
    }



    public function pending_finances_project(Request $request){
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

        return redirect('/finances-pending');
    }


    public function finances_department_forward_pending($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/finances-pending');
    }


    public function finances_completed(){
        $currentDateTime = now();
        $fcount = Projects::where('project_department','Finance Completed Project')->count();
        $fprojects = Projects::where('project_department','Finance Completed Project')->latest()->get();

        return view('departments.finance.finance_completed',compact('currentDateTime','fcount','fprojects'));
    }


    public function completed_finances_project(Request $request){
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

        return redirect('/finances-completed');
    }


    public function finances_department_forward_completed($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/finances-completed');
    }



    public function finances_filtering(){
        $currentDateTime = now();

        return view('departments.finance.finance_filtering',compact('currentDateTime'));
    }


    public function backup_finances_project(Request $request){
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

        return redirect('/finances-backup');
    }

}
