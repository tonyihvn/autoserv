@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">{{$jobs->first() ? $jobs->first()->contact->name : ''}} | <small style="color: green">Jobs</small></h3>
    <div style="text-align: right;"><a href="{{url('/newcjob/'.$customerid)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Job</a></div>
    <div class="row">
            <div class="panel">
            <small style="margin-left: 25px;;">Last Invoice No: <b style="text-align: center; color: green;">{{$lastinvoiceno}}</b></small>
                <div class="panel-body">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">


                                <th>Date</th>
                                <th>V. Reg No</th>
                                <th>Job No</th>

                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)

                                <tr>


                                    <td>{{$job->dated}}</td>
                                    <td>{{$job->vregno ? $job->vregno : ''}}</td>
                                    <td>
                                        @if ($job->jid!="0")
                                            {{$job->jid}}
                                        @else
                                            <form action="{{ route('addjobno') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$job->id}}">
                                                <div class="col-md-8">
                                                    <input type="number" name="jid" id="jid">
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-primary btn-xs">Save</button>
                                                </div>
                                            </form>
                                        @endif
                                        </td>

                                    <td><b>{{$job->amount}}</b></td>
                                    <td>{{$job->status}}</td>

                                    <td>
                                        <a href="{{url('/edit-job/'.$job->jobno)}}" class="label label-primary">Edit Job</a>
                                        <a href="{{url('/invoice/'.$job->jobno)}}/invoice" target="_blank" class="label label-success">Invoice</a>
                                        <a href="{{url('/invoice/'.$job->jobno)}}/estimate" target="_blank" class="label label-info">Estimate</a>
                                        <a href="{{url('/invoice/'.$job->jobno)}}/receipt" target="_blank" class="label label-primary">Receipt</a>
                                        <a href="{{url('/invoice/'.$job->jobno)}}/instruction" target="_blank" class="label label-info">Instruction</a>
                                        <a href="#"  data-toggle="modal" data-target="#invoicedate" id="{{$job->jobno}}" onClick="changeDate({{$job->jobno}})" class="label label-warning roledlink Super Admin">Change Date</a>

                                        <a href="{{url('/delete/'.$job->id)}}/jobs" class="label label-danger roledlink Admin Super"  onclick="return confirm('Are you sure you want to delete this record? {{$job->description}}?')">Delete</a>
                                        @if($job->jid>0 && $job->status=="Pending")
                                            <a href="{{url('/new-payment/'.$job->jid)}}" target="_blank" class="label label-primary roledlink Finance Admin Super">Make Payment</a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>

                    </table>


                </div>
            </div>

    </div>





@endsection
