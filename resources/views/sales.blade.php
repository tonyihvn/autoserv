@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Parts | <small style="color: green">Sales</small></h3>
    <div class="row">
            <div class="panel">

                <div class="panel-body">
                    <table class="table" id="products">
                        <thead>
                            <tr>
                                <th>Part Name</th>
                                <th>Part Number</th>
                                <th>Quantity</th>
                                <th>Unit Rate</th>
                                <th>Amount</th>
                                <th>Job No.</th>
                                <th>Date</th>
                                <th>Client</th>
                                <!-- Add other columns here -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->part->part_name }}</td>
                                    <td>{{ $sale->part->part_no }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->amount/$sale->quantity }}</td>
                                    <td>{{ $sale->amount }}</td>
                                    <td>{{ $sale->jobno }}</td>
                                    <td>{{ $sale->created_at }}</td>

                                    <!-- Add other columns here -->
                                    <td>
                                        {{$sale->contact->name}}
                                    </td>
                                    <td>
                                        <a href="{{url('/delete-sale/'.$sale->id)}}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
