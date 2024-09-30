@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Make Payment | <small style="color: green">Invoice No: {{$job->jid}}</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    <h4>Customer Name: <b>{{$job->contact->name}}</b></h4>
                </div>
                <div class="panel-body">
                        <form method="POST" action="{{ route('makepayment') }}">
                            @csrf
                            <input type="hidden" name="customerid" value="{{$job->customerid}}">
                            <input type="hidden" name="jobno" value="{{$job->jobno}}">
                            <input type="hidden" name="invoiceno" value="{{$job->jid}}">
                            <input type="hidden" name="title" value="{{$job->serviceorder[0]->title ?? $job->description}}">
                            <div>
                                <div class="row form-row">
                                    <div class="form-group col-md-4">
                                    <label for="amount">Total Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" value="{{$job->amount}}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="amountpaid">Amount to Pay</label>
                                        <input type="number" name="amountpaid" id="amountpaid" class="form-control" placeholder="Amount Paid"  value="{{$amounttopay}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dated">Date of Payment</label>
                                        <input type="text" name="dated" id="dated" class="form-control date" placeholder="Date of Payment">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="form-group col-md-4">
                                    <label for="paymethod">Payment Method</label>
                                    <select name="paymethod" id="paymethod" class="form-control">
                                        <option value="Cash">Cash</option>
                                        <option value="Bank Deposit">Bank Deposit</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Mobile Transfer">Mobile Transfer</option>
                                        <option value="POS">POS</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="particulars">Payment Ref/Particulars</label>
                                        <input type="text" name="particulars" id="particulars" class="form-control" placeholder="e.g. Teller No, Mobile Transfer REf">
                                    </div>



                                    <div class="form-group col-md-2">
                                        <label>Credit</label>
                                        <div>
                                            <input type="radio" id="Yes"
                                            name="credit" value="Yes">
                                            <span for="Yes">Yes</span>

                                            <input type="radio" id="No" checked
                                            name="credit" value="No">
                                            <span for="No">No</span>
                                        </div>
                                    </div>




                                </div>
                                <div style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">Make Payment</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
    </div>
@endsection
