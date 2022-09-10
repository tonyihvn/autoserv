@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">Reminders | <small style="color: green">Contact Customers</small></h3>
    <div class="row">
            
            <div class="card col-md-6 col-md-offset-3">
                <div class="card-body">
                   
                    @isset($message)
                        <div class="alert alert-dismissable alert-info">Your message was sent successfully!</div>
                    @endisset
                    
                    <div  style="text-align: right !important"><span class="label label-danger">Credit Balance: <b>{{ $creditbalance }}</b> </span></div>
                    
                    <form method="POST" action="{{ route('sendsms') }}">
                        @csrf
                        <input type="hidden" name="senderid" value="REMINDER">
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
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr>
                                <th width="20"><input type="checkbox" id="all" onclick="addnumber('all')" data-allnumbers="{{$allnumbers}}"></th>
                                <th>Customer Name/Organization</th>
                                <th>Phone Number</th>
                                <th>Next Service Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reminders as $rem)
                                @php
                                $number = "";
                                    if(isset($rem->contact)){
                                        $number = $rem->contact->telephoneno;
                                        if ($number!==null && substr($number,0,1)=="0") {
                                            $number = "234".ltrim($number,'0');
                                        }
                                    }
                                
                                    
                                        
                                        $now = time(); // or your date as well
                                        $lasts_date = strtotime($rem->dated);
                                        $datediff = $now - $lasts_date;
                                        
                                        $dayspast = round($datediff / (60 * 60 * 24));

                                        $due = "";
                                        $style = "";
                                        if($dayspast > 90){
                                            $days = $dayspast-90;
                                            $due = "Overdue By: ".$days." days";
                                            $style='style="background-color: #FFD580 !important"';
                                        }
                                        else if($dayspast < 90){
                                            $days = 90-$dayspast;
                                            $due = "Due in Next ".$days." days";
                                        }
                                        
                                        
                                @endphp
                                <tr>
                                    <td>
                                        @isset($rem->contact->telephoneno)
                                            <input type="checkbox" id="{{$number}}" onclick="addnumber({{$number}})" class="checkboxes">
                                        @endisset
                                    </td>
                                    <td>{{$rem->contact ? $rem->contact->name : $rem->customerid}}<br><small>{{$rem->contact ? $rem->contact->organization : ''}}</small></td>
                                    <td>{{$rem->contact ? $rem->contact->telephoneno : ''}}</td>
                                    <td>{{$due}}</td>
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        
    </div>
    
        
    
@endsection
