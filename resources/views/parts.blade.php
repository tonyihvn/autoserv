@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Edit | <small style="color: green">All Parts</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading" style="text-align: center">
                    <a href="{{url('add-part')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New Part</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="products">
                        <thead>
                            <tr>
                                <th>Part Name</th>
                                <th>Part Number</th>
                                <th>Description</th>
                                <th>Brand</th>
                                <th>Unit of Measurement</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>Qty In Stock</th>
                                <!-- Add other columns here -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parts as $part)
                                <tr>
                                    <td>{{ $part->part_name }}</td>
                                    <td>{{ $part->part_no }}</td>
                                    <td>{{ $part->description }}</td>
                                    <td>{{ $part->brand }}</td>
                                    <td>{{ $part->unit_of_measurement }}</td>
                                    <td>{{ $part->cost_price }}</td>
                                    <td>{{ $part->selling_price }}</td>

                                    <!-- Add other columns here -->
                                    <td>
                                        {{$part->stock->quantity_in_stock}}
                                    </td>
                                    <td>
                                        <a href="{{url('edit-part/'.$part->id)}}" class="btn btn-xs btn-primary">Edit</a>
                                        <a href="{{url('delete-part/'.$part->id)}}" class="btn btn-xs btn-danger">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
