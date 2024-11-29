@extends('layouts.theme')

<style>
    td input{
<<<<<<< HEAD
        font-size: 11px !important;
=======
        font-size: 0.9em !important;
    }

    select {

        padding: 2px 5px; /* Adjust padding values as needed */

        font-size: 0.8em !important; /* Set desired text size */

>>>>>>> master
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
<<<<<<< HEAD
                    <table class="table  responsive-table" id="products" style="font-size: 10px !important;">
=======
                    <table class="table  responsive-table" id="products" style="font-size: 12px !important; width: 100%">
>>>>>>> master
                        <thead>
                            <tr>
                                <th width="20"><input type="checkbox" id="all" onclick="addnumber('all')" data-allnumbers="{{$allnumbers}}"></th>
                                <th>Customer Name/Organization</th>
<<<<<<< HEAD
                                <th>Phone Number</th>
                                <th>VReg. No</th>
                                <th>Invoice No.</th>
                                <th width="50%">Discussion</th>
                                <th>Outcome</th>
                                <th>Action</th>
=======
                                <th width="80%">Customer Experience</th>

>>>>>>> master
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
<<<<<<< HEAD
                                    <td>{{$rem->contact->name ? $rem->contact->name : $rem->customerid}}<br><small>{{$rem->contact->organization ? $rem->contact->organization : ''}}</small></td>
                                    <td>{{$rem->contact->telephoneno ? $rem->contact->telephoneno : ''}}</td>
                                    <td>{{$rem->vregno}}</td>
                                    <td><a href="/invoice/{{$rem->jobno}}/invoice">{{$rem->jid}}</a></td>
=======
                                    <td>
                                        <br>
                                        {{$rem->contact->name ? $rem->contact->name : $rem->customerid}}<br><small>{{$rem->contact->organization ? $rem->contact->organization : ''}}</small>
                                        {{$rem->contact->telephoneno ? $rem->contact->telephoneno : ''}} <br>
                                        Reg No: {{$rem->vregno}} <br>
                                        Invoice No: <a href="{{url('/invoice/'.$rem->jobno.'/invoice')}}">{{$rem->jid}}</a>
                                    </td>

>>>>>>> master
                                    <td>
                                        <form action="{{ route('psfuform') }}" method="POST">
                                            <input type="hidden" name="customerid" value="{{$rem->customerid}}">
                                            <input type="hidden" name="vregno" value="{{$rem->vregno}}">
                                            <input type="hidden" name="jobno" value="{{$rem->jobno}}">
                                            <input type="hidden" name="jid" value="{{$rem->jid}}">

                                            @csrf
<<<<<<< HEAD
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
=======
                                            <table>
                                                <tr>
                                                    <td>
                                                        <select name="satisfied" id="p1" class="form-control">
                                                            <option value="" selected>Satisfied</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="treatment" id="p2" class="form-control">
                                                            <option value="" selected>Treatment</option>
                                                            <option value="Friendly">Friendly</option>
                                                            <option value="Neutral">Neutral</option>
                                                            <option value="Impersonal">Impersonal</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="waitedlong" id="p3" class="form-control">
                                                            <option value="" selected>Waited long?</option>
                                                            <option value="No">No</option>
                                                            <option value="Maybe">Maybe</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="explained" id="p4" class="form-control">
                                                            <option value="" selected>Explained</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="Not Really">Not Really</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <select name="ready" id="p5" class="form-control">
                                                            <option value="" selected>Ready on Time?</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="timescore" id="p6" class="form-control">
                                                            <option value="" selected>Time Score</option>
                                                            <option value="On Time">On Time</option>
                                                            <option value="Not On Time">Not On Time</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="impressed" id="p7" class="form-control">
                                                            <option value="" selected>Impressed?</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="Partially">Partially</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="recommend" id="p8" class="form-control">
                                                            <option value="" selected>Recommend?</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="3">
                                                        <textarea rows="2" name="discussion" class="form-control" placeholder="Discussion with client"></textarea>
                                                    </td>
                                                    <td colspan="3">
                                                        <textarea rows="2" name="outcome" id="outcom" class="form-control" placeholder="Outcome of PSFU">Satisfactory</textarea>
                                                    </td>
                                                    <td colspan="2">
                                                        <button type="save" class="btn btn-inline btn-primary btn-xs">Save</button>
                                                    </td>
                                                </form>
                                                </tr>
                                            </table>
                                    </td>



>>>>>>> master

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

    </div>



@endsection
