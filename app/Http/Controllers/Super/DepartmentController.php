<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;


class DepartmentController extends Controller
{
    //
    public function departments(){
        $departments= Departments::all();
        return view('helpdesk.admin.departments.departments',compact('departments'));
    }

    public function adddepartment(){
        return view('helpdesk.admin.departments.adddepartment');
    }

    public function addnewdepartment(Request $request){
        $dept=new Departments();
        $dept->deptID=$request->input('deptID');
        $dept->name=$request->input('name');
        $dept->country_code=$request->input('country_code');
        $dept->head=$request->input('head');
        $dept->headcontact=$request->input('headcontact');
        $dept->save();

        return redirect('/departments');
    }

    public function deletedepartment($id){
        $dept=Departments::find($id);
        $dept->delete();
        return redirect('/departments');
    }
}
