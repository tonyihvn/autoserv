@extends('layouts.theme')

@section('content')
@php $pagetype="report"; $sn=1; @endphp

    <h3 class="page-title">Contacts/Clients | <small style="color: green">Search Result</small></h3>
    <div class="row">
            <div class="panel">
               
                <div class="panel-body">
                    <small style="color: green;"><i>Tip: To merge duplicate contacts, click on the main account(first) then others to merge them to the first clicked contact</i></small>
                    <form method="POST" action="{{ route('mergecontacts') }}">
                        @csrf
                        <input type="hidden" name="mainaccount" id="mainaccount" value="">
                        <table class="table  responsive-table contacts" id="products">
                            <thead>
                                <tr style="color: ">
                                    <th>Select</th>
                                    <th>CustomerID</th>
                                    <th>Name</th>
                                    <th>Organization</th>
                                    <th>Phone No(s)</th>
                                    
                                    <th>Vat</th>
                                    <th>Sundry</th>
                                    <th style="width: 25% !important;">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn=1;
                                @endphp
                                @foreach ($contacts as $contact)

                                    <tr>
                                        <td><input type="checkbox" class="form-check mergeselector" id="ms{{$sn++}}" name="customerid[]" value="{{$contact->customerid}}"></td>
                                        <td>{{$contact->customerid}}</td>
                                        <td><b>{{$contact->name}}</b>
                                        </td>
                                        <td>{{$contact->organization}}</td>
                                        <td>{{$contact->telephoneno}}</td>
                                        
                                        <td>{{$contact->vat}}</td>
                                        <td>{{$contact->sundry}}</td>
                                        
                                        <td>
                                            <a href="/customer-jobs/{{$contact->customerid}}" class="label label-primary">Jobs</a>
                                            <a href="/newcjob/{{$contact->customerid}}" class="label label-warning">New Job</a>
                                            <a href="/customer-vehicles/{{$contact->customerid}}" class="label label-success">Vehicles</a>
                                            <a href="/edit-customer/{{$contact->customerid}}" class="label label-info">Edit</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary" id="mergebtn" style="position:sticky; right:0px;bottom:0px; float: right">Merge Selected Contacts</button>
                    </form>
                    <div style="text-align: right">
                        
                    </div>
                </div>
            </div>
        
    </div>
    

   
        

@endsection
