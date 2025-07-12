<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Projects;

class ComplainController extends Controller
{
    //
    public function complains(){
        $currentDateTime = now();
        return view('admin.complains.complains',compact('currentDateTime'));
    }
}
