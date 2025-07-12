<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function users(){
        $currentDateTime = now();
        $users = User::orderBy('id', 'desc')->get();
        $ucount = User::select('id')->count();

        return view('super.users.users',compact('currentDateTime','users','ucount'));
    }



    public function add_account(){
        $currentDateTime = now();
        return view ('super.users.add_account',compact('currentDateTime'));
    }


    public function add_new_account(Request $request){
        $new = new User();
    
        $new->name = $request->input('name');
        $new->department = $request->input('department');
        $new->svc = $request->input('svc');
        $new->email = $request->input('email');
        $new->password = Hash::make($request->input('password')); // Hashing the password
        $new->save();
    
        return redirect('add-account');
    }



}
