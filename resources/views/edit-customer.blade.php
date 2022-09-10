@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Edit | <small style="color: green">Customer Info</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    <h4>{{$contact->name}}</h4>
                </div>
                <div class="panel-body">
                        <form method="POST" action="{{ route('editcustomer') }}">
                            @csrf
                            <input type="hidden" name="customerid" value="{{$contact->customerid}}">
                            <div>
                                <div class="row form-row">                                
                                    <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Customer Name" value="{{$contact ? $contact->name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="organization">Organization</label>
                                        <input type="text" name="organization" id="organization" class="form-control" placeholder="Organization Name"  value="{{$contact ? $contact->organization:''}}">                                  
                                    </div>
                                    
                                </div>

                                <div class="row form-row">                                
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$contact ? $contact->address:''}}">                                  
                                    </div>                                    
                                </div>

                                <div class="row form-row">                                
                                    <div class="form-group col-md-6">
                                    <label for="telephoneno">Telephone No</label>
                                    <input type="text" name="telephoneno" id="telephoneno" class="form-control" placeholder="Phone Number" value="{{$contact ? $contact->telephoneno:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="E-mail Address" value="{{$contact ? $contact->email:''}}">                                  
                                    </div>
                                    
                                </div>

                                <div class="row form-row">

                                    <div class="form-group col-md-3">
                                        <label>Sundry</label>
                                        <div>
                                            <input type="radio" id="Yes"  {{$contact ? $contact->sundry=='2500' ? 'checked':'' : ''}}
                                            name="sundry" value="2500">
                                            <span for="Yes">Yes</span>
                                        
                                            <input type="radio" id="No"  {{$contact ? $contact->sundry!='2500' ? 'checked':'' : ''}}
                                            name="sundry" value="No">
                                            <span for="No">No</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Vat</label>
                                        <div>
                                            <input type="radio" id="five"  {{$contact ? $contact->vat=='5' ? 'checked':'' : ''}}
                                            name="vat" value="5">
                                            <span for="five">5%</span>
                                        
                                            <input type="radio" id="sevenpointfive"  {{$contact ? $contact->vat=='7.5' ? 'checked':'' : ''}}
                                            name="vat" value="7.5">
                                            <span for="sevenpointfive">7.5 %</span>

                                            <input type="radio" id="0"  {{$contact ? $contact->vat=='0' ? 'checked':'' : ''}}
                                            name="vat" value="0">
                                            <span for="0"> No Vat</span>

                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Credit</label>
                                        <div>
                                            <input type="radio" id="Yes"  {{$contact->credit=='Yes' ? 'checked':''}}
                                            name="credit" value="Yes">
                                            <span for="Yes">Yes</span>
                                        
                                            <input type="radio" id="No"  {{$contact->credit=='No' ? 'checked':''}}
                                            name="credit" value="No">
                                            <span for="No">No</span>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks" value="{{$contact ? $contact->remarks:''}}">                                  
                                    </div>

                                    
                                    
                                </div>
                                <div style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>        
    </div>
@endsection