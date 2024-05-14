<?php

namespace App\Http\Controllers;

use App\Models\parts;
use App\Models\supplies;

use Illuminate\Http\Request;

class PartsController extends Controller
{
    public function index()
    {
        $parts = parts::all();
        return view('parts', compact('parts'));
    }

    public function create()
    {
        return view('add-part');
    }

    public function store(Request $request)
    {
        // Validation logic here

        $part = parts::create($request->all());
        stock::create([
            'part_id'=>$part->id,
            'quantity_in_stock'=>0
        ]);

        return redirect()->route('parts')->with('success', 'Part created successfully.');
    }

    public function edit($partid)
    {
        $part = parts::where('id',$partid)->first();
        return view('edit-part', compact('part'));
    }

    public function update(Request $request)
    {
        // Validation logic here
        $part = parts::where('id',$request->id)->first();

        $part->update($request->all());

        return redirect()->route('parts')->with('success', 'Part updated successfully.');
    }

    public function destroy($partid)
    {
        parts::find($partid)->delete();

        return redirect()->route('parts')->with('success', 'Part deleted successfully.');
    }

    public function addSupply()
    {
        $parts = parts::select('id','part_name')->get();
        return view('add-supply', compact('parts'));
    }

    public function saveSupply(Request $request){
        // $supply->load('part'); // Load the related part

        
        // Increase stock
        $part = parts::where('id',$request->part_id)->first();

        $part->stock()->increment('quantity_in_stock', $request->quantity_supplied);

        $supplies = supplies::create($request->all());
        
        return view('supplies', compact('supplies'));
    }

    public function partSupplies()
    {
        $supplies = supplies::all();
        return view('supplies', compact('supplies'));
    }
}
