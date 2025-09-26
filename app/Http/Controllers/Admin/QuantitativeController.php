<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class QuantitativeController extends Controller
{
    //
    public function quantitative_surveyors_works(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Quantity surveyors')->latest()->get();
        $qcount = Projects::where('project_department','Quantity surveyors')->count();

        return view('admin.quantitative.quantitative',compact('currentDateTime','projects','qcount'));
   
    }


    public function quantitative_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/quantitative-surveyors-works');
    }


    public function quantity(){
        $currentDateTime = now();
        $qcount = Projects::where('project_department','Quantity surveyors')->count();
        $qprojects = Projects::where('project_department','Quantity surveyors')->latest()->get();
        
        return view('departments.quantity.quantity',compact('currentDateTime','qcount','qprojects'));
    }

    public function quantity_department_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/quantity');
    }


    public function quantity_share(){
        $currentDateTime = now();
        $qcount = Projects::where('project_department','Quantity surveyors')->count();
        $qprojects = Projects::where('project_department','Quantity surveyors')->latest()->get();


        return view('departments.quantity.quantity_share',compact('currentDateTime','qcount','qprojects'));
    }


    public function share_quantity_project(Request $request){
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

        return redirect('/quantity-share');
    }



    public function quantity_backup(){
        $currentDateTime = now();
        $qcount = Projects::where('project_department','Quantity surveyors Backup')->count();
        $qprojects = Projects::where('project_department','Quantity surveyors Backup')->latest()->get();


        return view('departments.quantity.quantity_backup',compact('currentDateTime','qcount','qprojects'));
    }


    public function quantity_department_forward_share($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/quantity-share');
    }


    public function quantity_part1(){
        $currentDateTime = now();

        return view('departments.quantity.quantity_part1',compact('currentDateTime'));
    }


    public function quantity_pending(){
        $currentDateTime = now();
        $qcount = Projects::where('project_department','Quantity surveyors Pending Project')->count();
        $qprojects = Projects::where('project_department','Quantity surveyors Pending Project')->latest()->get();

        return view('departments.quantity.quantity_pending',compact('currentDateTime','qcount','qprojects'));
    }



    public function pending_quantity_project(Request $request){
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

        return redirect('/quantity-pending');
    }


    public function quantity_department_forward_pending($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/quantity-pending');
    }


    public function quantity_completed(){
        $currentDateTime = now();
        $qcount = Projects::where('project_department','Quantity surveyors Completed Project')->count();
        $qprojects = Projects::where('project_department','Quantity surveyors Completed Project')->latest()->get();

        return view('departments.quantity.quantity_completed',compact('currentDateTime','qcount','qprojects'));
    }


    public function completed_quantity_project(Request $request){
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

        return redirect('/quantity-completed');
    }


    public function quantity_department_forward_completed($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/quantity-completed');
    }



    public function quantity_filtering(){
        $currentDateTime = now();

        return view('departments.quantity.quantity_filtering',compact('currentDateTime'));
    }


    public function backup_quantity_project(Request $request){
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

        return redirect('/quantity-backup');
    }
}
