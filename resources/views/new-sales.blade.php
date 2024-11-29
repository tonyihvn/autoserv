@extends('layouts.theme')

@section('content')
@php $pagename="namesearch"; $sn=1; @endphp
    <h3 class="page-title">Help | <small style="color: green">Need Help</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                        <h4>New Sales</h4>
                </div>
                <div class="panel-body">


                    <form method="POST" action="{{ route('add-sales') }}">
                        @csrf
                        <input type="hidden" name="jid" value="0">
                        <ul class="nav nav-tabs" id="jobordertabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Contact Information</a></li>
                            <li><a href="#tab2" data-toggle="tab">Sales</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab1">
                                <div class="row form-row">
                                    <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="nameTrigger" list="names" class="form-control" placeholder="Customer Name">
                                    <input type="hidden" id="customerid" name="customerid" value="New">
                                    <datalist id="names">
                                        @foreach ($allcontacts as $con)
                                            <option value="{!!$con->name!!}" data-customerid="{{$con->customerid}}">{!!$con->organization!!}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                    <div class="form-group col-md-6">
                                        <label for="organization">Organization</label>
                                        <input type="text" name="organization" id="organization" class="form-control" placeholder="Organization Name">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="form-group col-md-6">
                                    <label for="telephoneno">Telephone No</label>
                                    <input type="text" name="telephoneno" id="telephoneno" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="E-mail Address">
                                    </div>

                                </div>

                                <div class="row form-row">

                                    <div class="form-group col-md-3">
                                        <label>Sundry</label>
                                        <div>
                                            <input type="radio" id="Yes"
                                            name="sundry" value="2500">
                                            <span for="Yes">Yes</span>

                                            <input type="radio" id="No"
                                            name="sundry" value="0">
                                            <span for="No">No</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Vat</label>
                                        <div>
                                            <input type="radio" id="five"
                                            name="vat" value="5">
                                            <span for="five">5%</span>

                                            <input type="radio" id="sevenpointfive"
                                            name="vat" value="7.5">
                                            <span for="sevenpointfive">7.5 %</span>

                                            <input type="radio" id="0"
                                            name="vat" value="0">
                                            <span for="0"> No Vat</span>

                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Credit</label>
                                        <div>
                                            <input type="radio" id="Yes"
                                            name="credit" value="Yes">
                                            <span for="Yes">Yes</span>

                                            <input type="radio" id="No"
                                            name="credit" value="No">
                                            <span for="No">No</span>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks">
                                    </div>
                                </div>
                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>


                            <div class="tab-pane" id="tab2">
                                <h4>Select Products</h4>
                                <div id="productsales">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="partname">Product Name</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="quantity">Quantity</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="rate">Rate</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="amount">Amount</label>
                                        </div>

                                    </div>
                                        @php $pi = 1; @endphp
                                        <datalist id="productslist">
                                            @foreach ($parts as $pas)
                                                <option value="{{$pas->part_name}}" data-pid="{{ $pas->id }}" data-price="{{$pas->selling_price}}"  data-instock="{{ $pas->stock->quantity_in_stock }}">
                                            @endforeach
                                        </datalist>

                                        <div class="row form-row productslist" id="{{$pi}}">

                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <input list="productslist" id="pn{{$pi}}" onchange="updateId({{$pi}})" class="form-control partname" name="partname[]" placeholder="Product Name">
                                                    <input type="hidden" name="pnid[]" id="pnid{{$pi}}">
                                                    <span><small id="instock{{$pi}}"></small></span>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                <input type="number" class="form-control quantity" id="q{{$pi}}"  name="quantity[]" value="1">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                <input type="number" class="form-control rate" id="r{{$pi}}" name="rate[]" value="1">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                <input type="number" class="form-control amount" id="a{{$pi}}" name="amount[]" value="0">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-1">
                                                <span class="btn btn-xs btn-primary premover" onclick="removePr({{$pi}})">Remove</span>
                                            </div>
                                        </div>
                                </div>

                                <div style="text-align: center !important;"><span class="btn btn-success" id="partsaddbtn" onclick="addPr()">Add More</span></div>

                                <div class="row form-row">
                                    <div class="form-group col-md-9">
                                        <div class="form-group" style="text-align: right; font-weight: bold;">
                                            Vat <span id="vatview"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="vatcost" id="vatcost" readonly>
                                        </div>
                                    </div>
                                </div>



                                <div class="row form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group" style="text-align: right; font-weight: bold;">
                                            Discount (in Percentage %)
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                        <input type="number" class="form-control" name="discountpercent" id="discountpercent" step="0.01" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="discountcost" id="discountcost" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="form-group col-md-3">
                                        <label for="vregno">Vehicle (Optional)</label>
                                        <select class="form-control" name="vregno" id="vregno">
                                            <option value="" selected>NA</option>
                                            @foreach ($vehicles as $veh)
                                                <option value="{{$veh->vregno}}">{{$veh->vregno}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="dated">Date</label>
                                        <input type="text" name="dated" id="dated" class="form-control date" value="{{date("Y-m-d")}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group" style="text-align: right; font-weight: bold;">
                                            TOTAL AMOUNT
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-group">
                                        <input type="number" step="0.01" class="form-control" name="totalamount" id="totalamount" readonly>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-warning btnPrevious" >Previous</a><button type="submit" class="btn btn-success btnNext" >Save Order</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

    </div>
@endsection
