@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Vehicles | <small style="color: green">All Customers Vehicels</small></h3>
    <div class="row">
            <div class="panel">
<<<<<<< HEAD
               
=======

>>>>>>> master
                <div class="panel-body">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">
                                <th>Customer Name/Orgnixzation</th>
                                <th>V. Reg No</th>
                                <th>Brand</th>
                                <th>Model No</th>
<<<<<<< HEAD
                                
                                <th>Vin</th>
                                <th>Chasis No</th>
                                <th>Action</th>
                                
=======

                                <th>Vin</th>
                                <th>Chasis No</th>
                                <th>Action</th>

>>>>>>> master
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $veh)

                                <tr>
                                    <td>{!!$veh->contacts ? $veh->contacts->name ."<br><small style='color:green;'>".$veh->contacts->organization : $veh->customerid."</small>"!!}</td>
                                    <td><b>{{$veh->vregno}}</b>
                                    </td>
                                    <td>{{$veh->modelname}}</td>
                                    <td>{{$veh->modelno}}</td>
<<<<<<< HEAD
                                    
                                    <td>{{$veh->vin}}</td>
                                    <td>{{$veh->chasisno}}</td>
                                    
                                    <td>
                                        <a href="/newvjob/{{$veh->customerid}}/{{$veh->id}}" class="label label-primary">New Job</a>
                                        <a href="/vehicle-jobs/{{$veh->vregno}}" class="label label-warning">Jobs</a>
                                        <a href="/edit-vehicle/{{$veh->id}}" class="label label-info">Edit</a>
                                        <a href="/delete/{{$veh->id}}/vehicle" class="label label-danger"  onclick="return confirm('Are you sure you want to delete this record? {{$veh->vregno}}?')">Delete</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                    <div style="text-align: right">
                        
                    </div>
                </div>
            </div>
        
    </div>
    

   
        
=======

                                    <td>{{$veh->vin}}</td>
                                    <td>{{$veh->chasisno}}</td>

                                    <td>
                                        <a href="{{url('/newvjob/'.$veh->customerid.'/'.$veh->id)}}" class="label label-primary">New Job</a>
                                        <a href="{{url('/vehicle-jobs/'.$veh->vregno)}}" class="label label-warning">Jobs</a>
                                        <a href="{{url('/edit-vehicle/'.$veh->id)}}" class="label label-info">Edit</a>
                                        <a href="{{url('/delete/'.$veh->id)}}/vehicle" class="label label-danger"  onclick="return confirm('Are you sure you want to delete this record? {{$veh->vregno}}?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div style="text-align: right">

                    </div>
                </div>
            </div>

    </div>




>>>>>>> master

@endsection
