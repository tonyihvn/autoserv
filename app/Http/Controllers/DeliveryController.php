<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\jobs;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries', compact('deliveries'));
    }

    public function create()
    {
        $jobs = jobs::select('id','jobno','vregno','jid')->get();
        return view('add-delivery', compact('jobs'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'customerid' => 'required|exists:contacts,customerid',
        //     'job_no' => 'required|string|max:255',
        //     'amount' => 'required|numeric',
        //     'driver_name' => 'required|string|max:255',
        //     'driver_phone' => 'required|string|max:255',
        //     'delivery_company' => 'required|string|max:255',
        //     'expected_delivery_date' => 'required|date',
        //     'actual_delivery_date' => 'nullable|date',
        //     'other_instructions' => 'nullable|string',
        // ]);

        Delivery::create($request->all());

        return redirect()->route('deliveries.index')->with('message', 'Delivery created successfully.');
    }

    public function edit(Delivery $delivery)
    {
        return view('edit-delivery', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'customerid' => 'required|exists:customers,id',
            'job_no' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'driver_name' => 'required|string|max:255',
            'driver_phone' => 'required|string|max:255',
            'delivery_company' => 'required|string|max:255',
            'expected_delivery_date' => 'required|date',
            'actual_delivery_date' => 'nullable|date',
            'other_instructions' => 'nullable|string',
        ]);

        $delivery->update($request->all());

        return redirect()->route('deliveries.index')->with('message', 'Delivery updated successfully.');
    }

    public function actualDelivery(Request $request)
    {
        $delivery = Delivery::where('id',$request->delivery_id)->first();
        $delivery->status = $request->status;
        $delivery->payment_made = $request->payment_made;
        $delivery->received_by = $request->received_by;
        $delivery->actual_delivery_date = $request->actual_delivery_date;
        $delivery->save();
        return redirect()->back()->with('message', 'Delivery information updated successfully.');
    }

    public function deliveryNote($did){
        return '';
    }
}
