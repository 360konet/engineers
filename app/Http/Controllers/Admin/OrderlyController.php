<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Projects;
use App\Models\Part1;

class OrderlyController extends Controller
{
    //
    public function orderly_room_operations(){
        $currentDateTime = now();
        $projects = Projects::where('project_department','Orderly Room')->latest()->get();
        $ocount = Projects::where('project_department','Orderly Room')->count();

        return view('admin.orderly.orderly',compact('currentDateTime','projects','ocount'));
    }


    public function orderly_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/orderly-room-operations');
    }

    public function orderly(){
        $currentDateTime = now();
        $ocount = Projects::where('project_department','Orderly Room Completed Project')->count();
        $oprojects = Projects::where('project_department','Orderly Room Completed Project')->latest()->get();

        return view('departments.orderly.orderly',compact('currentDateTime','ocount','oprojects'));
    }

    public function orderly_department_forward($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/orderly');
    }


    public function orderly_share(){
        $currentDateTime = now();
        $ocount = Projects::where('project_department','Orderly Room')->count();
        $oprojects = Projects::where('project_department','Orderly Room')->latest()->get();


        return view('departments.orderly.orderly_share',compact('currentDateTime','ocount','oprojects'));
    }


    public function share_orderly_project(Request $request){
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

        return redirect('/orderly-share');
    }



    public function orderly_backup(){
        $currentDateTime = now();
        $ocount = Projects::where('project_department','Orderly Room Backup')->count();
        $oprojects = Projects::where('project_department','Orderly Room Backup')->latest()->get();


        return view('departments.orderly.orderly_backup',compact('currentDateTime','ocount','oprojects'));
    }


    public function orderly_department_forward_share($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/orderly-share');
    }


    public function orderly_part1(){
        $currentDateTime = now();
        $part1= Part1::latest()->get();

        return view('departments.orderly.orderly_part1',compact('currentDateTime','part1'));
    }


    public function orderly_pending(){
        $currentDateTime = now();
        $ocount = Projects::where('project_department','Orderly Room Pending Project')->count();
        $oprojects = Projects::where('project_department','Orderly Room Pending Project')->latest()->get();

        return view('departments.orderly.orderly_pending',compact('currentDateTime','ocount','oprojects'));
    }



    public function pending_orderly_project(Request $request){
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

        return redirect('/orderly-pending');
    }


    public function orderly_department_forward_pending($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/orderly-pending');
    }


    public function orderly_completed(){
        $currentDateTime = now();
        $ocount = Projects::where('project_department','Orderly Room Completed Project')->count();
        $oprojects = Projects::where('project_department','Orderly Room Completed Project')->latest()->get();

        return view('departments.orderly.orderly_completed',compact('currentDateTime','ocount','oprojects'));
    }


    public function completed_orderly_project(Request $request){
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

        return redirect('/orderly-completed');
    }


    public function orderly_department_forward_completed($id,Request $request){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/orderly-completed');
    }



    public function orderly_filtering(){
        $currentDateTime = now();

        return view('departments.orderly.orderly_filtering',compact('currentDateTime'));
    }


    public function backup_orderly_project(Request $request){
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

        return redirect('/orderly-backup');
    }


    public function orderly_part1_submit(Request $request){
        $part1 = new Part1();

        $part1->title=$request->input('title');
        $part1->publisher=$request->input('publisher');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFilename = $file->getClientOriginalName();
        
            $ext = $file->getClientOriginalExtension();
        
            $filename = time() . '_' . $originalFilename;
        
            $file->move('part1', $filename);
        
            $part1->file = $originalFilename;
            $part1->file =  $filename;
        }
        $part1->save();

        return redirect('/orderly-part1');
    }
}
