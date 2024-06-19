@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Deliveries | <small style="color: green">All Deliveries</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading" style="text-align: center">
                    <a href="{{route('deliveries.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Delivery Job</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>Job No</th>
                                <th>Amount</th>
                                <th>Driver Name</th>
                                <th>Driver Phone</th>
                                <th>Delivery Company</th>
                                <th>Expected Delivery Date</th>
                                <th>Actual Delivery Date</th>
                                <th>Other Instructions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery->id }}</td>
                                    <td>{{ isset($delivery->customer) ? $delivery->customer->name : '' }}</td>
                                    <td>{{ $delivery->job_no }}</td>
                                    <td>{{ $delivery->amount }}</td>
                                    <td>{{ $delivery->driver_name }}</td>
                                    <td>{{ $delivery->driver_phone }}</td>
                                    <td>{{ $delivery->delivery_company }}</td>
                                    <td>{{ $delivery->expected_delivery_date }}</td>
                                    <td>{{ $delivery->actual_delivery_date }}</td>
                                    <td>{{ $delivery->other_instructions }}</td>
                                    <td>
                                        @if($delivery->status!="Delivered")
                                        <form action="{{route('actualDelivery')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="delivery_id" value="{{$delivery->id}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" style="width: 100% !important" name="received_by" placeholder="Received By Name/Phone">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" style="width: 100% !important" name="payment_made" placeholder="Amount Paid" value="{{$delivery->amount}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control date" style="width: 100% !important" name="actual_delivery_date" placeholder="Date Delivered">
                                                </div>
                                                <div class="col-md-6">
                                                      <select class="form-control" name="status">
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="In Progress" selected>In Progress</option>
                                                        <option value="Returned">Returned</option>
                                                        <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="submit" class="btn btn-primary btn-xs" value="Save">
                                                </div>
                                            </div>
                                        </form>
                                        @else

                                        Received By: {{$delivery->received_by." Date: ".$delivery->actual_delivery_date }}
                                         <a href="{{url('delivery_note/'.$delivery->id)}}" class="btn btn-xs btn-primary">Delivery Note</a>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
