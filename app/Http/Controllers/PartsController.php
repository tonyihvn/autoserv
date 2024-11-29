<?php

namespace App\Http\Controllers;

use App\Models\parts;
use App\Models\supplies;
<<<<<<< HEAD
=======
use App\Models\stock;
>>>>>>> master

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

<<<<<<< HEAD
        parts::create($request->all());

        return redirect()->route('parts')->with('success', 'Part created successfully.');
=======
        $part = parts::create($request->all());
        stock::create([
            'part_id'=>$part->id,
            'quantity_in_stock'=>0
        ]);

        return redirect()->route('parts')->with('message', 'Part created successfully.');
>>>>>>> master
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

<<<<<<< HEAD
        return redirect()->route('parts')->with('success', 'Part updated successfully.');
=======
        return redirect()->route('parts')->with('message', 'Part updated successfully.');
>>>>>>> master
    }

    public function destroy($partid)
    {
        parts::find($partid)->delete();

<<<<<<< HEAD
        return redirect()->route('parts')->with('success', 'Part deleted successfully.');
    }

    public function addSupply(Request $request){
        // $supply->load('part'); // Load the related part

        supplies::create($request->all());
        // Increase stock
        $part = find($request->partid);

        $part->stock()->increment('quantity_in_stock', $supply->quantity_supplied);

        return view('supplies.show', compact('supply'));
=======
        return redirect()->route('parts')->with('message', 'Part deleted successfully.');
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
        supplies::create($request->all());
        $part->stock()->increment('quantity_in_stock', $request->quantity_supplied);

        $supplies = supplies::all();

        return view('supplies', compact('supplies'))->with('message', 'Supply record saved successfully.');
>>>>>>> master
    }

    public function partSupplies()
    {
        $supplies = supplies::all();
        return view('supplies', compact('supplies'));
    }
<<<<<<< HEAD
=======

    public function deleteSupply($sid)
    {
        $supply = supplies::where('id',$sid)->first();
        // $partid = $supply->part_id;
        $qsupplied = $supply->quantity_supplied;
        $supply->part->stock()->decrement('quantity_in_stock', $qsupplied);
        return redirect()->back()->with(['message'=>'The Supply record has been deleted successfully']);
    }
>>>>>>> master
}
