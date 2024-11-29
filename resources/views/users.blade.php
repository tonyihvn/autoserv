@extends('layouts.theme')

@section('content')
@php $pagetype="report";@endphp

    <div class = "row" style="width:98%; margin:auto;">
        <div class="col s12">
            <h3 class="page-title">Users | <small style="color: green">All ERP Users</small></h3>
<<<<<<< HEAD
        
            @if ($usersa!=NULL)
            <div>
                <a href="/register" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
=======

            @if ($usersa!=NULL)
            <div>
                <a href="{{url('/register')}}" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
>>>>>>> master
            </div>
            <table id="products" class="table responsive-table" style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th class="roledlink Super Admin">Password</th>
<<<<<<< HEAD
                        <th>Phone Number</th>                        
=======
                        <th>Phone Number</th>
>>>>>>> master
                        <th>Unit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
<<<<<<< HEAD
                    @foreach ($usersa as $ca)                 
                    
=======
                    @foreach ($usersa as $ca)

>>>>>>> master
                    <tr>
                        <td>{{$ca->name}}</td>
                        <td>{{$ca->email}}</td>
                        <td class="roledlink Super Admin">{{$ca->password2}}</td>
                        <td>{{$ca->phone_number}}</td>
                        <td>{{$ca->role}}</td>
<<<<<<< HEAD
                       
                        <td><a href="delete/{{$ca->id}}/user" class="btn btn-danger btn-sm roledlink Super Admin">Delete</a></td>
                        
                    
=======

                        <td><a href="delete/{{$ca->id}}/user" class="btn btn-danger btn-sm roledlink Super Admin">Delete</a></td>


>>>>>>> master
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
<<<<<<< HEAD
                    <tr>                    
                        <th>Name</th>
                        <th>E-mail</th>
                        <th class="roledlink Super Admin">Password</th>
                        <th>Phone Number</th>                        
=======
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th class="roledlink Super Admin">Password</th>
                        <th>Phone Number</th>
>>>>>>> master
                        <th>Unit</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
           @else
                <blockquote>No User found in the database.</blockquote>
            @endif
        </div>

<<<<<<< HEAD
     
    </div>
@endsection
=======

    </div>
@endsection
>>>>>>> master
