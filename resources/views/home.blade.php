@extends('layouts.theme')

@section('content')
<style>
.main-box-layout{
margin: 0px;
margin-top: 30px;
position: relative;
box-shadow: -3px 3px 3px 0px #5f5e5e;
}
.main-box-layout:hover .box-icon-section i{
font-size:70px;
transform: rotate(360deg);
transition:1s;
}
.box-icon-section{
display: table;
height:100px;
color:#fff;
}
.box-icon-section i{
font-size:30px;
display: table-cell;
vertical-align: middle;
transition:transform 0.4s ease-in-out;
transition: 1s;
}
.box-text-section{
background-color:#1f1e1e;
}
.box-text-section p{
margin: 0px;
color:#fff;
padding:10px 0px;
}
.label .badge{
position: absolute;
top:-19px;
left: 50%;
transform: translateX(-50%);
/*background-color: #4b4949;*/
color: #fff;
box-shadow: 0px 0px 3px 0px #fff;
border: 2px solid #fff;
height: 35px;
width: auto;
font-size: 1em;
}

.newbtn a{
position: absolute;
bottom:-24px;
left: 50%;
transform: translateX(-50%);
/*background-color: #212f4e;*/
color: #fff;
box-shadow: 0px 0px 3px 0px #fff;
border: 2px solid #fff;
font-size: 1em;
}

.amcharts-chart-div a {
  position: absolute;
  visibility: hidden;
}

amcharts-chart-div a:before {
  content: "Kojo Autos";
  visibility: visible;
}

g text{
   font-size: 0.7em !important;
}

.justify-content-md-center{
    background: url("{{asset('/images/toyota_SUV.png')}}") no-repeat;
}
</style>
    @php $pagename="dashboard"; @endphp

    <h3 class="page-title">Dashboard | <small style="color: green">Stats</small></h3>
    <div class="row">
        <div class="panel">
            <!--
                <div class="panel-heading">
                    <h3 class="panel-title">Stats</h3>
                </div>
            -->
            <div class="panel-body" style="display: block; overflow-x: auto; white-space: nowrap;">
                <div class="container">

                    <div class="row form-row justify-content-md-center" style="padding-bottom: 40px;">
                        <div class="col-lg-4 col-sm-4 col-12 text-center">
                            <div class="row main-box-layout img-thumbnail">
                                <div class="col-lg-12 col-sm-12 col-12 box-icon-section bg-primary">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12 box-text-section">
                                    <p>Customers</p>
                                </div>
                                <div class="label">
                                    <h3><span class="badge badge-pill bg-danger">{{number_format($countcustomers,0)}}</span></h3>
                                </div>
                                <div class="newbtn">
                                    <a href="{{ url('/newjob')}}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-12 text-center">
                            <div class="row main-box-layout img-thumbnail">
                                <div class="col-lg-12 col-sm-12 col-12 box-icon-section bg-primary">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12 box-text-section">
                                    <p>Vehicles</p>
                                </div>
                                <div class="label">
                                    <h3><span class="badge badge-pill bg-warning">{{number_format($countvehicles,0)}}</span></h3>
                                </div>
                                <div class="newbtn">
                                    <a href="{{ url('/vehicles')}}" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-12 text-center">
                            <div class="row main-box-layout img-thumbnail">
                                <div class="col-lg-12 col-sm-12 col-12 box-icon-section bg-primary">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12 box-text-section">
                                    <p>Active Jobs</p>
                                </div>
                                <div class="label">
                                    <h3><span class="badge badge-pill bg-success">{{number_format($countpjobs,0)}}</span></h3>
                                </div>
                                <div class="newbtn">
                                    <a href="{{ url('/newjob')}}" class="btn btn-primary">New Job</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <h4>Job / Performance Trend | <small style="color: green">Last 3 Weeks</small></h4>
                        <div id="performancechart" style="width: 100%; height: 400px; background-color: #FFFFFF;" >

                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-6">

                            <h4>Schedules / Service Reminders | <small style="color: green">(+-)30 Days</small> <a class="btn btn-sm btn-primary" href="{{ url('/reminders')}}">View All Reminders</a></h4>
                            <table class="table table-bordered responsive-table" id="products" style="font-size: 0.7em !important">
                                <thead>
                                    <tr>

                                        <th>Customer/Organization</th>
                                        <th>Vehicle Detail</th>
                                        <th>Next ServiceDate</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reminders as $rem)
                                    @php
                                        $now = time(); // or your date as well
                                        $due = "";
                                        $style = "";
                                        if($rem->next_due!=""){
                                            // IF NEXT DUE IS PROVIDED
                                            $days_ahead = strtotime($rem->next_due);
                                            $days_ahead_diff = $days_ahead-$now;
                                            $num_days_ahead = round($days_ahead_diff / (60 * 60 * 24));

                                            if($num_days_ahead<0){
                                                $due = "Overdue By: ".$num_days_ahead." days";
                                                $style='style="background-color: #FFD580 !important"';
                                            }else{
                                                $due = "Due in Next ".$num_days_ahead." days";
                                            }
                                        }else{
                                            // IF NEXT DUE IS NOT PROVIDED
                                            $lasts_date = strtotime($rem->dated);
                                            $datediff = $now - $lasts_date;
                                            $dayspast = round($datediff / (60 * 60 * 24));

                                            if($dayspast > 90){
                                                $days = $dayspast-90;
                                                $due = "Overdue By: ".$days." days";
                                                $style='style="background-color: #FFD580 !important"';
                                            }
                                            else if($dayspast < 90){
                                                $days = 90-$dayspast;
                                                $due = "Due in Next ".$days." days";
                                            }
                                        }
                                    @endphp
                                        <tr {!!$style!!}>

                                            <td><b>{{$rem->contact ? $rem->contact->name : $rem->customerid}} <br> {!!$rem->contact->name<$rem->contact->organization ? '<small><i>'.$rem->contact->organization.'</i></small>' : ''!!}</b>
                                            </td>

                                            <td>{{$rem->vregno}}</td>
                                            <td {{$style}}>
                                                <b>{{$due}}</b></td>


                                            <td>
                                                <a href="{{ url('/invoice/'.$rem->jobno.'/invoice')}}" target="_blank" class="label label-warning roledlink Super Front-Desk">View Job</a>
                                                <a href="{{ url('/jobpsfu/'.$rem->jobno)}}" target="_blank" class="label label-success">PSFU</a>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>

                        </div>

                        <div class="col-md-6">
                            <h4>Memos | <small style="color: green">To Dos, Messages</small></h4>

                            <table class="table  responsive-table" id="products">
                                <thead>
                                    <tr style="color: ">
                                        <th>Title</th>
                                        <th>Customer Info</th>
                                        <th>Delivery Date</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mytasks as $task)

                                        <tr>
                                            <td><a href="{{ url('/tasks')}}"><b>{{$task->title}}</b></a></td>
                                            <td>{{is_numeric($task->member)?$allusers->where('id',$task->member)->first()->name:$task->member}}</td>
                                            <td>{{$task->date}}</td>
                                            <td>{{$task->status}}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <style>
        body{
            background:#eee;
            }

            .card-box {
                position: relative;
                color: #fff;
                padding: 20px 10px 40px;
                margin: 20px 0px;
            }
            .card-box:hover {
                text-decoration: none;
                color: #f1f1f1;
            }
            .card-box:hover .icon i {
                font-size: 100px;
                transition: 1s;
                -webkit-transition: 1s;
            }
            .card-box .inner {
                padding: 5px 10px 0 10px;
            }
            .card-box h3 {
                font-size: 27px;
                font-weight: bold;
                margin: 0 0 8px 0;
                white-space: nowrap;
                padding: 0;
                text-align: left;
            }
            .card-box p {
                font-size: 15px;
            }
            .card-box .icon {
                position: absolute;
                top: auto;
                bottom: 5px;
                right: 5px;
                z-index: 0;
                font-size: 72px;
                color: rgba(0, 0, 0, 0.15);
            }
            .card-box .card-box-footer {
                position: absolute;
                left: 0px;
                bottom: 0px;
                text-align: center;
                padding: 3px 0;
                color: rgba(255, 255, 255, 0.8);
                background: rgba(0, 0, 0, 0.1);
                width: 100%;
                text-decoration: none;
            }
            .card-box:hover .card-box-footer {
                background: rgba(0, 0, 0, 0.3);
            }
            .bg-blue {
                background-color: #00c0ef !important;
            }
            .bg-green {
                background-color: #00a65a !important;
            }
            .bg-orange {
                background-color: #f39c12 !important;
            }
            .bg-red {
                background-color: #d9534f !important;
            }

    </style>


@endsection
