<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

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

    public function getStocks()
    {
        $stocks = Stock::with('user')->latest()->get();
    
        return response()->json([
            'data' => $stocks
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'serial'   => 'required|string|unique:stocks,serial',
            'product'  => 'required|string',
            'project_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // handle image upload
        $imageName = time().'.'.$request->project_file->extension();
        $request->project_file->move(public_path('uploads/stocks'), $imageName);
    
        Stock::create([
            'user_id' => auth()->id(), // 👈 capture uploader
            'category' => $request->category,
            'serial'   => $request->serial,
            'product'  => $request->product,
            'product_image' => 'uploads/stocks/'.$imageName,
        ]);
    
        return back()->with('success', 'Stock added successfully!');
    }


    public function stores_out_stock()
    {
        return view('super.stores.out_stock');
    }
}
