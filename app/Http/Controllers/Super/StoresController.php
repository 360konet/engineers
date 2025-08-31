<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\OutStock;
use App\Models\Shelf;
use Illuminate\Support\Facades\Auth;

class StoresController extends Controller
{
    //
    public function stores_dashboard()
    {
        return view('super.stores.dashboard');
    }

    public function getOutStocks()
    {
        $outStocks = OutStock::with(['product', 'shelf', 'user'])->latest()->get();
        
        return response()->json($outStocks);
    }




    public function getStockStats()
    {
        // Example logic (adjust based on your DB schema)
        $inStock = Stock::count(); 
        $outStock = OutStock::count(); 
        $availableStock = $inStock - $outStock; 
    
        // stocks added today
        $todayStock = Stock::whereDate('created_at', today())->count();
    
        return response()->json([
            'inStock' => $inStock,
            'outStock' => $outStock,
            'availableStock' => $availableStock,
            'todayStock' => $todayStock,
        ]);
    }


    public function store_shelf(Request $request)
    {
        $request->validate([
            'shelf_id' => 'required|unique:shelves,shelf_id',
            'shelf_name' => 'required|string|max:255',
        ]);
    
        Shelf::create([
            'shelf_id' => $request->shelf_id,
            'shelf_name' => $request->shelf_name,
        ]);
    
        return redirect()->back()->with('success', 'Shelf added successfully!');
    }


    public function update_shelf(Request $request, $id)
    {
        $request->validate([
            'shelf_id' => 'required|unique:shelves,shelf_id,' . $id,
            'shelf_name' => 'required|string|max:255',
        ]);
    
        $shelf = Shelf::findOrFail($id);
        $shelf->update($request->only(['shelf_id', 'shelf_name']));
    
        return redirect()->back()->with('success', 'Shelf updated successfully!');
    }
    
    public function destroy_shelf($id)
    {
        Shelf::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Shelf deleted successfully!');
    }



    public function stores_in_stock()
    {
        $shelves = Shelf::all();
        return view('super.stores.in_stock', compact('shelves'));
    }

    public function getStocks()
    {
        $stocks = Stock::with('user','category')->orderby('created_at','desc')->get();
    
        return response()->json([
            'data' => $stocks
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'product'  => 'required|string',
            'project_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // handle image upload
        $imageName = time().'.'.$request->project_file->extension();
        $request->project_file->move(public_path('uploads/stocks'), $imageName);
    
        Stock::create([
            'user_id' => auth()->id(),
            'category' => $request->category,
            'serial'   => $request->serial,
            'product'  => $request->product,
            'qty'  => $request->qty,
            'details'  => $request->details,
            'product_image' => 'uploads/stocks/'.$imageName,
        ]);
    
        return back()->with('success', 'Stock added successfully!');
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->update($request->all());
        return redirect()->back()->with('success', 'Stock updated successfully!');
    }
    
    public function destroy($id)
    {
        Stock::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Stock deleted successfully!');
    }



    public function stores_out_stock()
    {
        $shelves = Shelf::all();
        return view('super.stores.out_stock', compact('shelves'));
    }

    public function getProductsByShelf($shelfId)
    {
        $products = Stock::where('category', $shelfId)
            ->get(['id', 'product as product_name', 'qty as quantity']);
    
        return response()->json($products);
    }


    public function assignOutStock(Request $request)
    {
        $request->validate([
            'shelf_id' => 'required|exists:shelves,id',
            'product_id' => 'required|exists:stocks,id',
            'quantity' => 'required|integer|min:1',
            'assigned_to' => 'required|string|max:255',
            'remarks' => 'nullable|string',
        ]);
    
        $stock = Stock::findOrFail($request->product_id);
    
        if ($request->quantity > $stock->qty) {
            return redirect()->back()->with('error', 'Quantity exceeds available stock!');
        }
    
        // Deduct stock
        $stock->qty -= $request->quantity;
        $stock->save();
    
        // Save assignment
        OutStock::create([
            'shelf_id'   => $request->shelf_id,
            'product_id' => $stock->id,
            'user_id'    => Auth::id(), // store who assigned
            'quantity'   => $request->quantity,
            'assigned_to'=> $request->assigned_to,
            'remarks'    => $request->remarks,
        ]);
    
        return redirect()->back()->with('success', 'Stock assigned successfully!');
    }


    public function getOutStockData()
    {
        $outStocks = OutStock::with(['shelf', 'product', 'user'])
            ->latest()
            ->get();
    
        return response()->json($outStocks);
    }




}
