@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Supplies | <small style="color: green">All Supplies</small></h3>
    <div class="row">
            <div class="panel">

                <div class="panel-body">
                    <table class="table">
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
                                    <td>{{ $supply->payment_made ? 'Yes' : 'No' }}</td>
                                    <!-- Add other columns here -->
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>





@endsection
