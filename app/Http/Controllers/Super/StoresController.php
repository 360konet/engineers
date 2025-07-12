<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    //
    public function stores_dashboard()
    {
        return view('super.stores.dashboard');
    }

    public function stores_in_stock()
    {
        return view('super.stores.in_stock');
    }

    public function stores_out_stock()
    {
        return view('super.stores.out_stock');
    }
}
