<?php

namespace App\Http\Controllers;

use App\Models\partsorder;
use Illuminate\Http\Request;

class PartsorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        //
=======
        $sales = partsorder::orderBy('created_at','desc')->get();
        return view('sales', compact('sales'));
>>>>>>> master
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\partsorder  $partsorder
     * @return \Illuminate\Http\Response
     */
    public function show(partsorder $partsorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\partsorder  $partsorder
     * @return \Illuminate\Http\Response
     */
    public function edit(partsorder $partsorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\partsorder  $partsorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partsorder $partsorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\partsorder  $partsorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(partsorder $partsorder)
    {
        //
    }
}
