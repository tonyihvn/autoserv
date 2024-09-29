@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Edit | <small style="color: green">Add New Part</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <!-- resources/views/supplies/form.blade.php -->

                    <form action="{{ route('save-part') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="part_name">Part Name</label>
                                    <input type="text" name="part_name" id="part_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="part_no">Part Number</label>
                                    <input type="text" name="part_no" id="part_no" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" name="brand" id="brand" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unit_of_measurement">Unit of Measurement</label>
                                    <input type="text" name="unit_of_measurement" id="unit_of_measurement" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cost_price">Cost Price</label>
                                    <input type="number" name="cost_price" id="cost_price" class="form-control" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selling_price">Selling Price</label>
                                    <input type="number" name="selling_price" id="selling_price" class="form-control" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Location</label>
                                    <input type="text" name="category" id="category" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Part</button>
                            <a href="{{ route('parts') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
    </div>
@endsection
