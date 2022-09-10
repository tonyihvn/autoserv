@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Personnel | <small style="color: green">All Staffs</small></h3>
    <div style="text-align: right;"><a href="/add-personnel" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Staff</a></div>

    <div class="row">
            <div class="panel">
               
                <div class="panel-body">
                    <table class="table  responsive-table" id="products" style="font-size: 0.9em !important">
                        <thead>
                            <tr style="color: ">
                                
                                <th>Full Name</th>
                                <th>Designation</th>                                
                                <th>Department</th> 
                                <th>E-mail Address</th>                               
                                <th>Phone No</th>
                                <th>DoB</th>
                                <th style="width: 15% !important;">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personnels as $per)

                                <tr>
                                    
                                    <td><b>{{$per->surname.", ".$per->firstname." ".$per->othernames}}</b>
                                    </td>
                                    <td>{{$per->designation}}</td>
                                    <td>{{$per->department}}</td>
                                    <td>{{$per->email}}</td>
                                    
                                    <td><b>{{$per->phoneno}}</b></td>
                                    <td>{{$per->dob}}</td>
                                    
                                    <td>
                                        <a href="/edit-personnel/{{$per->id}}" target="_blank" class="label label-primary">Edit</a>

                                        <a href="/paysalary/{{$per->id}}/{{date("M")}}/" target="_blank" class="label label-warning roledlink Finance Super">Pay {{date("M")}}'s Salary </a>
                                        <a href="/memo/{{$per->id}}" target="_blank" class="label label-info">Send Memo</a>
                                        <a href="/delete/{{$per->id}}/payments" class="label label-danger roledlink Super Admin"  onclick="return confirm('Are you sure you want to delete this record? {{$per->surname}}\'s account?')">Delete</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                        
                    </table>

                </div>
            </div>
        
    </div>
    

   
        

@endsection
