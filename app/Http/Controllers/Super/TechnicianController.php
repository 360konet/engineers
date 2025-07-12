<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Technicians;

class TechnicianController extends Controller
{
    //
    public function technicians(){
        $technicians=Technicians::all();
        return view ('helpdesk.admin.technicians.technicians',compact('technicians'));
    }

    public function addtechnician(){
        $departments= Departments::all();
        return view ('helpdesk.admin.technicians.addtechnician',compact('departments'));
    }

    public function addnewtechnician(Request $request){
        $tech = new Technicians();
        $tech->techID=$request->input('techID');
        $tech->name=$request->input('name');
        $tech->dept=$request->input('dept');
        $tech->country_code=$request->input('country_code');
        $tech->techcontact=$request->input('techcontact');
        $tech->status="Avaliable";
        $tech->save();

        return redirect ('/technicians');
    }

    public function deletetechnician($id){
        $deltech= Technicians::find($id);
        $deltech->delete();
        return redirect ('/technicians');
    }
}
