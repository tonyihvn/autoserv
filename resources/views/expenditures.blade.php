@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Expenditures | <small style="color: green">All Expenses</small></h3>
<<<<<<< HEAD
    <div style="text-align: right;"><a href="/newexpenditure" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Expenditure</a></div>
    <div class="row">
            <div class="panel">
               
=======
    <div style="text-align: right;"><a href="{{url('/newexpenditure')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Expenditure</a></div>
    <div class="row">
            <div class="panel">

>>>>>>> master
                <div class="panel-body">
                    <table class="table  responsive-table" id="products" style="font-size: 0.9em !important">
                        <thead>
                            <tr style="color: ">
<<<<<<< HEAD
                                
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Spent By</th>                                
=======

                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Spent By</th>
>>>>>>> master
                                <th>Payment Method</th>
                                <th>Particulars</th>
                                <th>Category</th>
                                <th>Paid To</th>
                                <th style="width: 15% !important;">Action</th>
<<<<<<< HEAD
                                
=======

>>>>>>> master
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenditures as $exp)
<<<<<<< HEAD
                                <tr>                                    
=======
                                <tr>
>>>>>>> master
                                    <td><small>{!!$exp->description!!}</small></td>
                                    <td>{{number_format($exp->amount,2)}}</td>
                                    <td>{{$exp->dated}}</td>
                                    <td>{{$exp->spentby}}</td>
                                    <td><b>{{$exp->paymethod}}</b></td>
                                    <td>{{$exp->particulars}}</td>
                                    <td><b>{{$exp->category}}</b></td>
                                    <td>{{$exp->paidto}}</td>
                                    <td>
<<<<<<< HEAD
                                        <a href="/delete/{{$exp->id}}/expenditure" class="label label-danger roledlink Super Admin"  onclick="return confirm('Are you sure you want to delete this record? {{$exp->description}}?')">Delete</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                        
                     
=======
                                        <a href="{{url('/delete/'.$exp->id)}}/expenditure" class="label label-danger roledlink Super Admin"  onclick="return confirm('Are you sure you want to delete this record? {{$exp->description}}?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>


>>>>>>> master
                    </table>

                    <div style="text-align: right; color: #337ab7;">
                        <span>	&darr; Older Records Navigation | <small>each number contains 400 records</small></span>
                        {{$expenditures->links()}}
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        
    </div>
    

   
        
=======

    </div>




>>>>>>> master

@endsection
