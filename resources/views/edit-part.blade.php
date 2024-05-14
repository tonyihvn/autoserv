@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Edit | <small style="color: green">Add New Part</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                        <!-- resources/views/parts/form.blade.php -->
                        <form action="{{ isset('add-part') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{$part->id}}">

                            <div class="form-group" class="col-md-8">
                                <label for="part_name">Part Name</label>
                                <input type="text" name="part_name" id="part_name" class="form-control" value="{{$part->part_name}}">
                            </div>

                            <div class="form-group" class="col-md-4">
                                <label for="part_no">Part Number</label>
                                <input type="text" name="part_no" id="part_no" class="form-control" value="{{$part->part_no}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{$part->description}}</textarea>
                            </div>

                            <div class="form-group" class="col-md-3">
                                <label for="brand">Brand Name</label>
                                <input type="text" name="brand" id="brand" class="form-control" value="{{$part->brand}}">
                            </div>

                            <div class="form-group" class="col-md-3">
                                <label for="unit_of_measurement">Unit of Measurement</label>
                                <input type="text" name="unit_of_measurement" id="unit_of_measurement" class="form-control" placeholder="Kilograms, Litres" value="{{$part->unit_of_measurement}}">
                            </div>

                            <div class="form-group" class="col-md-3">
                                <label for="selling_proce">Selling Price</label>
                                <input type="text" name="selling_proce" id="selling_proce" class="form-control" value="{{$part->selling_price}}">
                            </div>

                            <div class="form-group" class="col-md-3">
                                <label for="cost_price">Cost Price</label>
                                <input type="text" name="cost_price" id="cost_price" class="form-control" value="{{$part->cost_price}}">
                            </div>

                            <div class="form-group" class="col-md-4">
                                <label for="type">Type</label>
                                <input type="text" name="type" id="type" class="form-control" value="{{$part->type}}">
                            </div>

                            <div class="form-group" class="col-md-4">
                                <label for="category">Category</label>
                                <input type="text" name="category" id="category" class="form-control" value="{{$part->category}}">
                            </div>

                            <div class="form-group" class="col-md-4">
                                <label for="remarks">Remakrs</label>
                                <input type="text" name="remarks" id="remarks" class="form-control" value="{{$part->remarks}}">
                            </div>


                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary">Add Parts</button>
                                <a href="{{ route('parts') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                </div>
            </div>
    </div>
@endsection
