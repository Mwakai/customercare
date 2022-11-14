@extends('layouts.backend')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-primary collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Open Ticket</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Records</h3>

                                <button class="btn btn-success">
                                    <i class="fa fa-plus"></i>Add
                                </button>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Title</th>
                                            <th>Issue</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{$ticket->id}}</td>
                                            <td>{{$ticket->name}}</td>
                                            <td>{{$ticket->email}}</td>
                                            <td>{{$ticket->title}}</td>
                                            <td>{{$ticket->issue}}</td>
                                            <td>
                                                <img src="{{asset('ticket/'.$ticket->image)}}" class="img-circle" style="width:40px; height:30px">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="">
                                                    <i class="fa fa-edit"></i>Edit

                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="">
                                                    <i class="fa fa-trash"></i>Delete

                                                </button>
                                            </td>
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
    </div>
</div>
@endsection