@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Edit | <small style="color: green">Add New Part</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                        <!-- resources/views/parts/form.blade.php -->
                        <form action="{{ route('save-supply') }}" method="POST">
                            @csrf

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="part_id">Part</label>
                                <select name="part_id" id="part_id" class="form-control">
                                    @foreach($parts as $part)
                                        <option value="{{ $part->id }}">{{ $part->part_name }}</option>
                                    @endforeach
                                </select>
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="quantity_supplied">Quantity Supplied</label>
                                <input type="number" name="quantity_supplied" id="quantity_supplied" class="form-control" value="">
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="supplier_name">Supplier Name</label>
                                <input type="text" name="supplier_name" id="supplier_name" class="form-control" value="">
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="">
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="date_supplied">Date Supplied</label>
                                <input type="date" name="date_supplied" id="date_supplied" class="form-control" value="">
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="batch_no">Batch No/Invoice</label>
                                <input type="text" name="batch_no" id="batch_no" class="form-control" value="">
                            </div>

<<<<<<< HEAD
                            <div class="form-group">
=======
                            <div class="form-group col-md-6">
>>>>>>> master
                                <label for="payment_made">Payment Made</label>
                                <input type="text" name="payment_made" id="payment_made" class="form-control" value="">
                            </div>
                            <!-- Add other fields as needed -->

<<<<<<< HEAD
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Supply</button>
                                <a href="{{ route('supplies.index') }}" class="btn btn-secondary">Cancel</a>
=======
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Add Supply</button>
                                <a href="{{ route('supplies') }}" class="btn btn-secondary">Cancel</a>
>>>>>>> master
                            </div>
                        </form>

                </div>
            </div>
    </div>
@endsection
