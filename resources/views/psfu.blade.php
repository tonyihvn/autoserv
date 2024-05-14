@extends('layouts.theme')

<style>
    td input{
        font-size: 11px !important;
    }
</style>
@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">PSFU | <small style="color: green">Customer Service</small></h3>
    <div class="row">

            <div class="card col-md-6 col-md-offset-3">
                <div class="card-body">

                    @isset($message)
                        <div class="alert alert-dismissable alert-info">Your message was sent successfully!</div>
                    @endisset

                    <div  style="text-align: right !important"><span class="label label-danger">Credit Balance: <b>{{ $creditbalance }}</b> </span></div>

                    <form method="POST" action="{{ route('sendsms') }}">
                        @csrf
                        <input type="hidden" name="senderid" value="GREETINGS">
                        <div class="form-group">
                            <label for="recipients">Recipients</label>
                            <input type="text" name="recipients" id="recipients" class="form-control" placeholder="e.g. 234803333333,2349000000,...">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea type="text" name="body" id="body" class="form-control" rows="4" maxlength="500"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send SMS') }}
                            </button>
                        </div>

                        <div><span style="text-align: left; color: green"  id="charcounter"></span> | <span style="text-align: center"  id="pagecounter"></span> | <span style="text-align: right"  id="charleft"></span></div>
                        <div id="error" style="color: red"></div>


                    </form>
                </div>
            </div>

            <div class="panel">

                <div class="panel-body">
                    <table class="table  responsive-table" id="products" style="font-size: 10px !important;">
                        <thead>
                            <tr>
                                <th width="20"><input type="checkbox" id="all" onclick="addnumber('all')" data-allnumbers="{{$allnumbers}}"></th>
                                <th>Customer Name/Organization</th>
                                <th>Phone Number</th>
                                <th>VReg. No</th>
                                <th>Invoice No.</th>
                                <th width="50%">Discussion</th>
                                <th>Outcome</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reminders as $rem)
                                @php
                                $number = "";
                                    if(isset($rem->contact->telephoneno)){
                                        $number = $rem->contact->telephoneno;
                                        if ($number!==null && substr($number,0,1)=="0") {
                                            $number = "234".ltrim($number,'0');
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        @isset($rem->contact->telephoneno)
                                            <input type="checkbox" id="{{$number}}" onclick="addnumber({{$number}})" class="checkboxes">
                                        @endisset
                                    </td>
                                    <td>{{$rem->contact->name ? $rem->contact->name : $rem->customerid}}<br><small>{{$rem->contact->organization ? $rem->contact->organization : ''}}</small></td>
                                    <td>{{$rem->contact->telephoneno ? $rem->contact->telephoneno : ''}}</td>
                                    <td>{{$rem->vregno}}</td>
                                    <td><a href="/invoice/{{$rem->jobno}}/invoice">{{$rem->jid}}</a></td>
                                    <td>
                                        <form action="{{ route('psfuform') }}" method="POST">
                                            <input type="hidden" name="customerid" value="{{$rem->customerid}}">
                                            <input type="hidden" name="vregno" value="{{$rem->vregno}}">
                                            <input type="hidden" name="jobno" value="{{$rem->jobno}}">
                                            <input type="hidden" name="jid" value="{{$rem->jid}}">

                                            @csrf
                                        <table>
                                            <tr>
                                                <td>
                                                    <select name="satisfied" id="p1" class="form-control">
                                                        <option value="" selected>Satisfied</option>
                                                        <option value="3">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="treatment" id="p2" class="form-control">
                                                        <option value="" selected>Treatment</option>
                                                        <option value="3">Friendly</option>
                                                        <option value="2">Neutral</option>
                                                        <option value="1">Impersonal</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="waitedlong" id="p3" class="form-control">
                                                        <option value="" selected>Waited long?</option>
                                                        <option value="3">No</option>
                                                        <option value="2">Maybe</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="explained" id="p4" class="form-control">
                                                        <option value="" selected>Explained</option>
                                                        <option value="3">Yes</option>
                                                        <option value="2">Not Really</option>
                                                        <option value="1">No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="ready" id="p5" class="form-control">
                                                        <option value="" selected>Ready on Time?</option>
                                                        <option value="3">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="timescore" id="p6" class="form-control">
                                                        <option value="" selected>Time Score</option>
                                                        <option value="3">On Time</option>
                                                        <option value="0">Not On Time</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="impressed" id="p7" class="form-control">
                                                        <option value="" selected>Impressed?</option>
                                                        <option value="3">Yes</option>
                                                        <option value="2">Partially</option>
                                                        <option value="1">No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="recommend" id="p" class="form-control">
                                                        <option value="" selected>Recommend?</option>
                                                        <option value="3">Yes</option>
                                                        <option value="1">No</option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>

                                        <td>
                                            <input type="text" name="discussion" class="form-control" placeholder="Enter discussions...">

                                            <br>
                                            @foreach ($rem->psfu as $pps)
                                            <span>{{$pps->discussion}}</span><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <input type="text" name="outcome" id="">
                                        </td>
                                        <td>
                                            <button type="save" class="btn btn-inline btn-primary btn-xs">Save</button>
                                        </td>
                                    </form>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

    </div>



@endsection
