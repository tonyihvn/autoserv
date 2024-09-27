@extends('layouts.theme')

@section('content')
@php $pagetype="report"; @endphp

    <h3 class="page-title">Tasks | <small style="color: green">TO DOs</small></h3>
    <a href="#" class="btn btn-primary pull-right" style="margin-bottom: 10px;" data-toggle="modal" data-target="#task">Add New Task</a>

    <div class="row">
            <div class="panel">

                <div class="panel-body">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">
                                <th>Title</th>
                                <th>Details</th>
                                <th>Customer Info</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Assigned To</th>
                                <th>Set Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)

                                <tr>
                                    <td><b>{{$task->title}}</b></td>
                                    <td>{{$task->activities}}</td>
                                    <td>{{is_numeric($task->member)?$users->where('id',$task->member)->first()->name:$task->member}}</td>
                                    <td>{{$task->date}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>{{is_numeric($task->assigned_to)?$users->where('id',$task->assigned_to)->first()->name:$task->assigned_to}}</td>

                                    <td>
                                        <a href="{{url('/inprogresstask/'.$task->id)}}" class="label label-warning">In Progress</a>
                                        <a href="{{url('/completetask/'.$task->id)}}" class="label label-success">Completed</a>

                                        <a href="{{url('/delete-task/'.$task->id)}}" class="label label-danger"  onclick="return confirm('Are you sure you want to delete this record? {{$task->title}}?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div style="text-align: right">
                        {{href="{{url('/->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>

    </div>

     <!-- The Modal -->
        <div class="modal" id="task">
            <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Add New Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">


                    <form method="POST" action="{{ route('newtask') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">

                        <input type="hidden" name="status" value="Not Completed">

                        <div class="form-group">
                            <input type="text" name="member" list="allcontacts" class="form-control" placeholder="Customer Name">
                                    <datalist id="allcontacts">
                                        @foreach ($allcontacts as $con)
                                            <option value="{!!$con->name!!}" data-customerid="{{$con->customerid}}"">{!!$con->organization!!}</option>
                                        @endforeach
                                    </datalist>
                        </div>

                        <div class="form-group">
                            <label for="assigned_to"  class="control-label ">Assigned To:</label>
                            <select class="form-control" name="assigned_to" id="assigned_to">
                                @foreach ($users as $usr)
                                    <option value="{{$usr->id}}">{{$usr->name}}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="date">Date to Deliver</label>
                            <input type="text" name="date" id="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="category" class="control-label">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option value="Admin" selected>Admin</option>
                                <option value="Followup">Followup</option>
                                <option value="Others" selected>Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="activities"  class="control-label">Activities</label>
                            <textarea name="activities" id="activities" class="form-control" placeholder="Activities" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Staff Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Set New Task') }}
                            </button>
                        </div>


                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
            </div>
        </div>



@endsection
