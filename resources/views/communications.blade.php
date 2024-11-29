@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">SMS | <small style="color: green">Send Bulk SMS</small></h3>
    <div class="row">
<<<<<<< HEAD
            
            <div class="card col-md-6 col-md-offset-3">
                <div class="card-body">
                   
                    @isset($message)
                        <div class="alert alert-dismissable alert-info">Your message was sent successfully!</div>
                    @endisset
                    
                    <div  style="text-align: right !important"><span class="label label-danger">Credit Balance: <b>{{ $creditbalance }}</b> </span></div>
                    
=======

            <div class="card col-md-6 col-md-offset-3">
                <div class="card-body">

                    @isset($message)
                        <div class="alert alert-dismissable alert-info">Your message was sent successfully!</div>
                    @endisset

                    <div  style="text-align: right !important"><span class="label label-danger">Credit Balance: <b>{{ $creditbalance }}</b> </span></div>

>>>>>>> master
                    <form method="POST" action="{{ route('sendsms') }}">
                        @csrf
                        <input type="hidden" name="senderid" value="GREETINGS">
                        <div class="form-group">
                            <label for="recipients">Recipients</label>
                            <input type="text" name="recipients" id="recipients" class="form-control" placeholder="e.g. 234803333333,2349000000,...">
                        </div>
<<<<<<< HEAD
        
=======

>>>>>>> master
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea type="text" name="body" id="body" class="form-control" rows="4" maxlength="500"></textarea>
                        </div>
<<<<<<< HEAD
        
=======

>>>>>>> master
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send SMS') }}
                            </button>
                        </div>

                        <div><span style="text-align: left; color: green"  id="charcounter"></span> | <span style="text-align: center"  id="pagecounter"></span> | <span style="text-align: right"  id="charleft"></span></div>
                        <div id="error" style="color: red"></div>
<<<<<<< HEAD
        
                          
                    </form>
                </div>
            </div>
        
            <div class="panel">
              
=======


                    </form>
                </div>
            </div>

            <div class="panel">

>>>>>>> master
                <div class="panel-body">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr>
                                <th width="20"><input type="checkbox" id="all" onclick="addnumber('all')" data-allnumbers="{{$allnumbers}}"></th>
                                <th>Customer Name/Organization</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reminders as $rem)
                                @php
                                $number = "";
<<<<<<< HEAD
                                    if(isset($mnumber->contact)){
=======
                                    if(isset($rem->telephoneno)){
>>>>>>> master
                                        $number = $rem->telephoneno;
                                        if ($number!==null && substr($number,0,1)=="0") {
                                            $number = "234".ltrim($number,'0');
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        @isset($rem->telephoneno)
                                            <input type="checkbox" id="{{$number}}" onclick="addnumber({{$number}})" class="checkboxes">
                                        @endisset
<<<<<<< HEAD
                                    </td>
                                    <td>{{$rem->name ? $rem->name : $rem->customerid}}<br><small>{{$rem->organization ? $rem->organization : ''}}</small></td>
                                    <td>{{$rem->telephoneno ? $rem->telephoneno : ''}}</td>
                                    
                                </tr>
                            @endforeach
                            
                            
=======

                                    </td>
                                    <td>{{$rem->name ? $rem->name : $rem->customerid}}<br><small>{{$rem->organization ? $rem->organization : ''}}</small></td>
                                    <td>{{$rem->telephoneno ? $rem->telephoneno : ''}}</td>

                                </tr>
                            @endforeach


>>>>>>> master
                        </tbody>
                    </table>
                </div>
            </div>
<<<<<<< HEAD
        
    </div>
    
        
    
=======

    </div>



>>>>>>> master
@endsection
