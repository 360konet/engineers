<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentDateTime = now();
        $newprojects = Projects::where('project_department','Pending Project')->count();
        $completedprojects = Projects::where('project_department','Completed Project')->count();
        $projects = Projects::where('project_department', 'Pending Project')->orderBy('created_at', 'desc')->take(5)->get();
        $users = User::select('id')->count();

        return view('super.home', compact('currentDateTime','newprojects','users','completedprojects','projects'));
    }

    public function change_department(Request $request,$id){
        $project =  Projects::find($id);
        
        $project->project_department=$request->input('project_department');
        $project->update();

        return redirect('/home');
    }
}
