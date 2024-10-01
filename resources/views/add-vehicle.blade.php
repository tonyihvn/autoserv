@extends('layouts.theme')

@section('content')
@php $pagename="namesearch"; $sn=1; @endphp
    <h3 class="page-title">Vehicle | <small style="color: green">Add Vehicle</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                        <h4>New Vehicle</h4>
                </div>
                <div class="panel-body">

                    <form method="POST" action="{{ route('addNewVehicle') }}">
                        @csrf

                            <div class="tab-pane" id="tab2">
                                <div class="row form-row">
                                    <div class="form-group col-md-4">
                                        <label for="customerid">Owner's Name</label>
                                        <input type="text" name="customerid" id="customerid" class="form-control" placeholder="Customer ID" value="{{$job->contact ? $job->contact->customerid:$customerid}}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="vregno">Vehicle Registration No:</label>
                                        <input type="text" name="vregno" id="vregno" class="form-control" placeholder="Vehicle Registration No" value="{{$vehicle ? $vehicle->vregno:''}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="regdate">Vehicle Reg. Date</label>
                                        <input type="text" name="regdate" id="regdate" class="form-control date" placeholder="First Visit Date" value="{{$vehicle ? $vehicle->regdate:''}}">
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <h5>Vehicle Category</h5>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                          <label for="modelname">Model Name</label>
                                          <input type="text"
                                            class="form-control" name="modelname" id="modelname" placeholder="Model Name" value="{{$vehicle ? $vehicle->modelname:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                          <label for="modelno">Model Number</label>
                                          <input type="text"
                                            class="form-control" name="modelno" id="modelno" placeholder="Model Number/Year" value="{{$vehicle ? $vehicle->modelno:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                          <label for="frameno">Frame Number</label>
                                          <input type="text"
                                            class="form-control" name="frameno" id="frameno" placeholder="Frame Number" value="{{$vehicle ? $vehicle->frameno:''}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                          <label for="vin">Current Odometer Reading</label>
                                          <input type="text"
                                            class="form-control" name="vin" id="vin" placeholder="Odometer Reading" value="{{$vehicle ? $vehicle->vin:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                          <label for="chasisno">Chasis Number</label>
                                          <input type="text"
                                            class="form-control" name="chasisno" id="chasisno" placeholder="Chasis Number" value="{{$vehicle ? $vehicle->chasisno:''}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                          <label for="color">Color</label>
                                          <input type="text"
                                            class="form-control" name="color" id="color" placeholder="Color" value="{{$vehicle ? $vehicle->color:''}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="vcondition">Vehicle Condition</label>
                                        <input type="text" name="vcondition" id="vcondition" class="form-control" placeholder="Vehicle Condition" value="{{$vehicle ? $vehicle->vcondition:''}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="daterecieved">Date Recieved</label>
                                        <input type="text" name="daterecieved" id="daterecieved" class="form-control date" placeholder="Date Recieved" value="{{$vehicle ? $vehicle->daterecieved:''}}">
                                    </div>

                                </div>

                                <a class="btn btn-primary btnPrevious">Previous</a><a class="btn btn-primary btnNext" >Service</a>

                                <a class="btn btn-warning" id="gotodiagnosis">Vehicle Diagnosis</a>

                            </div>



                        </div>

                    </form>
                </div>
            </div>

    </div>
@endsection
