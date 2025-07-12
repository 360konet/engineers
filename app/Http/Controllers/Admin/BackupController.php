<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class BackupController extends Controller
{
    //
    public function backups(){
        $currentDateTime = now();
        $projects = Projects::orderBy('id', 'desc')->get();
        $bcount = Projects::select('id')->count();

        return view('admin.backups.backups',compact('currentDateTime','projects','bcount'));
    }
}
