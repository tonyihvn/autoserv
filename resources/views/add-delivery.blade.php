@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Delivery | <small style="color: green">New Delivery Job</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <!-- resources/views/supplies/form.blade.php -->

                    <form action="{{  route('deliveries.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="customerid">Customer Name</label>
                            <select name="customerid" id="customerid" class="form-control">
                                @if (isset($customername))
                                    <option value="{{$customerid}}" selected>{{$customername}}</option>
                                @else
                                    <option value="{{ old('customerid', $delivery->customer->customerid ?? '')}}" selected>{{ old('customerid', $delivery->customer->name ?? '')}}</option>
                                @endif
                                @foreach($allcontacts as $cus)
                                    <option value="{{ $cus->customerid }}">{{ $cus->name." (".$cus->organization.") " }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="job_no">Job No</label>
                            <select name="customerid" id="customerid" class="form-control">
                                @if (isset($customername))
                                    <option value="{{$jobid}}" selected>{{$jobid}}</option>
                                @else
                                    <option value="{{ old('job_no', $delivery->job->id ?? '')}}" selected>{{ old('job_no', $delivery->job->id ?? '')}}</option>
                                @endif
                                @foreach($jobs as $jb)
                                    <option value="{{ $jb->id }}">{{ $jb->jobno." (Invoice No: ".$jb->jid.") " }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" value="{{ old('amount', $delivery->amount ?? '') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="driver_name">Driver Name</label>
                            <input type="text" name="driver_name" class="form-control" value="{{ old('driver_name', $delivery->driver_name ?? '') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="driver_phone">Driver Phone</label>
                            <input type="text" name="driver_phone" class="form-control" value="{{ old('driver_phone', $delivery->driver_phone ?? '') }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="delivery_company">Delivery Company</label>
                            <input type="text" name="delivery_company" class="form-control" value="{{ old('delivery_company', $delivery->delivery_company ?? '') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="expected_delivery_date">Expected Delivery Date</label>
                            <input type="text" name="expected_delivery_date" class="form-control date" value="{{ old('expected_delivery_date', $delivery->expected_delivery_date ?? '') }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="actual_delivery_date">Actual Delivery Date</label>
                            <input type="text" name="actual_delivery_date" class="form-control date" value="{{ old('actual_delivery_date', $delivery->actual_delivery_date ?? '') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="other_instructions">Other Instructions</label>
                            <textarea name="other_instructions" class="form-control">{{ old('other_instructions', $delivery->other_instructions ?? '') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Delivery Job</button>
                    </form>

                </div>
            </div>
    </div>
@endsection
