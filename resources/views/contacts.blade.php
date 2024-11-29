@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Contacts/Clients | <small style="color: green"></small></h3>
    <div class="row">
            <div class="panel">
<<<<<<< HEAD
               
=======

>>>>>>> master
                <div class="panel-body">
                        @csrf
                        <table class="table  responsive-table contacts" id="products">
                            <thead>
                                <tr style="color: ">
                                    <th>CustomerID</th>
                                    <th>Name</th>
                                    <th>Organization</th>
<<<<<<< HEAD
                                    <th>Phone No(s)</th>                                    
=======
                                    <th>Phone No(s)</th>
>>>>>>> master
                                    <th>Vat</th>
                                    <th>Sundry</th>
                                    <th style="width: 25% !important;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
<<<<<<< HEAD
                                
=======

>>>>>>> master
                                @foreach ($contacts as $contact)

                                    <tr>
                                        <td>{{$contact->customerid}}</td>
                                        <td><b>{{$contact->name}}</b></td>
                                        <td>{{$contact->organization}}</td>
<<<<<<< HEAD
                                        <td>{{$contact->telephoneno}}</td>                                        
                                        <td>{{$contact->vat}}</td>
                                        <td>{{$contact->sundry}}</td>
                                        
                                        <td>
                                            <a href="/customer-jobs/{{$contact->customerid}}" class="label label-primary">Jobs</a>
                                            <a href="/newcjob/{{$contact->customerid}}" class="label label-warning">New Job</a>
                                            <a href="/customer-vehicles/{{$contact->customerid}}" class="label label-success">Vehicles</a>
                                            <a href="/edit-customer/{{$contact->customerid}}" class="label label-info">Edit</a>

                                            <a href="/delete/{{$contact->id}}/contacts" class="label label-danger"  onclick="return confirm('Are you sure you want to delete this record? {{$contact->title}}?')">Delete</a>
                                        </td>
                                        
=======
                                        <td>{{$contact->telephoneno}}</td>
                                        <td>{{$contact->vat}}</td>
                                        <td>{{$contact->sundry}}</td>

                                        <td>
                                            <a href="{{url('/customer-jobs/'.$contact->customerid)}}" class="label label-primary">Jobs</a>
                                            <a href="{{url('/newcjob/'.$contact->customerid)}}" class="label label-warning">New Job</a>
                                            <a href="{{url('/customer-vehicles/'.$contact->customerid)}}" class="label label-success">Vehicles</a>
                                            <a href="{{url('/edit-customer/'.$contact->customerid)}}" class="label label-info">Edit</a>

                                            <a href="{{url('/delete/'.$contact->id)}}/contacts" class="label label-danger"  onclick="return confirm('Are you sure you want to delete this record? {{$contact->title}}?')">Delete</a>
                                        </td>

>>>>>>> master
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div style="text-align: right">
<<<<<<< HEAD
                        
                    </div>
                </div>
            </div>
        
    </div>
    

   
        
=======

                    </div>
                </div>
            </div>

    </div>




>>>>>>> master

@endsection
