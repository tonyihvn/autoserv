@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

<<<<<<< HEAD
    <h3 class="page-title">Supplies | <small style="color: green">All Supplies</small></h3>
    <div class="row">
            <div class="panel">

                <div class="panel-body">
                    <table class="table">
=======
    <h3 class="page-title">Supplies | <small style="color: green">All Supplies From Vendors</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading" style="text-align: center">
                    <a href="{{url('add-supply')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New Supply</a>
                </div>

                <div class="panel-body">
                    <table class="table" id="products">
>>>>>>> master
                        <thead>
                            <tr>
                                <th>Part Name</th>
                                <th>Quantity Supplied</th>
                                <th>Supplier Name</th>
                                <th>Phone Number</th>
                                <th>Date Supplied</th>
                                <th>Batch Number</th>
                                <th>Payment Made</th>
                                <!-- Add other columns here -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplies as $supply)
                                <tr>
                                    <td>{{ $supply->part->part_name }}</td>
                                    <td>{{ $supply->quantity_supplied }}</td>
                                    <td>{{ $supply->supplier_name }}</td>
                                    <td>{{ $supply->phone_number }}</td>
                                    <td>{{ $supply->date_supplied }}</td>
                                    <td>{{ $supply->batch_no }}</td>
<<<<<<< HEAD
                                    <td>{{ $supply->payment_made ? 'Yes' : 'No' }}</td>
                                    <!-- Add other columns here -->
                                    <td>

=======
                                    <td>{{ $supply->payment_made}}</td>
                                    <!-- Add other columns here -->
                                    <td>
                                        <a href="{{url('delete-supply/'.$supply->id)}}" class="roled-link Admin btn btn-xs btn-danger" onclick="return confirm('Are you sure, you want to delete the supply record, Note: your stock will reduce?')">Delete</a>
>>>>>>> master
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>





@endsection
