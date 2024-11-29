@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Edit | <small style="color: green">Add New Part</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <!-- resources/views/supplies/form.blade.php -->
                    <form action="{{ route('deliveries.update', $delivery->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="customer_id">Customer ID</label>
                            <input type="text" name="customer_id" class="form-control" value="{{ $delivery->customer_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="job_no">Job No</label>
                            <input type="text" name="job_no" class="form-control" value="{{ $delivery->job_no }}" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" value="{{ $delivery->amount }}" required>
                        </div>
                        <div class="form-group">
                            <label for="driver_name">Driver Name</label>
                            <input type="text" name="driver_name" class="form-control" value="{{ $delivery->driver_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="driver_phone">Driver Phone</label>
                            <input type="text" name="driver_phone" class="form-control" value="{{ $delivery->driver_phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="delivery_company">Delivery Company</label>
                            <input type="text" name="delivery_company" class="form-control" value="{{ $delivery->delivery_company }}" required>
                        </div>
                        <div class="form-group">
                            <label for="expected_delivery_date">Expected Delivery Date</label>
                            <input type="date" name="expected_delivery_date" class="form-control" value="{{ $delivery->expected_delivery_date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="actual_delivery_date">Actual Delivery Date</label>
                            <input type="date" name="actual_delivery_date" class="form-control" value="{{ $delivery->actual_delivery_date }}">
                        </div>
                        <div class="form-group">
                            <label for="other_instructions">Other Instructions</label>
                            <textarea name="other_instructions" class="form-control">{{ $delivery->other_instructions }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>


                </div>
            </div>
    </div>
@endsection
