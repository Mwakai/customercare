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
                                @if(!empty($total))
                                <h3>{{$total}} Records</h3>
                                @endif

                            
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
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
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal">
                                                    <i class="fa fa-edit"></i>Edit

                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fa fa-trash"></i>Delete

                                                </button>
                                            </td>
                                        </tr>

                                        <!--EDIT MODAL-->
                                        <div class="modal fade" id="editModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update: </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <input type="text" name="id" value="" hidden="true">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control  " name="image_name" value="">
                                                                          
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                      <div class="form-group">
                                                                          <label>Email</label>
                                                                          <input type="email" class="form-control @error('heading') is-invalid @enderror " name="heading" value="">
                                                                       
                                                                        
                                                                      </div>
                                                                  </div>

                                                                  <div class="col-md-12">
                                                                      <div class="form-group">
                                                                          <label>Title</label>
                                                                          <input type="text" class="form-control @error('head') is-invalid @enderror " name="head" value="">
                                                                        
                                                                      </div>
                                                                  </div>

                                                                  <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Issue</label>
                                                                        <textarea class="form-control" name="paragraph">
                                                                            

                                                                        </textarea>
                                                                    
                                                                      </div>
                                                                  </div>

                                                                  <div class="col-md-12">
                                                                      <img src="" width="100px" height="90px">
                                                                  </div>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                              <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                                              <button type="submit" class="btn btn-success">Save</button>
                                                          </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--END OF EDIT MODAL-->

                                       
                                       
                                    @endforeach
                                    </tbody>
                                </table> 
                                {!!$tickets->links()!!}
                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     


</div>
@endsection