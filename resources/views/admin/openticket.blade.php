@extends('layouts.backend')
@section('content')

@if(session('success'))

  <div class="alert alert-success" id="successMessage">
    {{session('success')}}
  </div>
@endif

@if(session('failed'))
<div class="alert alert-danger" id="failedMessage">
  {{session('failed')}}
</div>
@endif
<script>

  setTimeout(
    function(){
      $("#successMessage").delay(3000).fadeOut('fast');
    },1000
  );
  
  setTimeout(
    function(){
      $("failedMessage").delay(3000).fadeOut('fast');
    },1000

  );
</script>


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
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewModal{{$ticket->id}}">
                                                    <i class="fa fa-eye"></i>&nbspView

                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$ticket->id}}">
                                                    <i class="fa fa-trash"></i>Delete

                                                </button>
                                            </td>
                                        </tr>

                                        <!--VIEW MODAL-->
                                        <div class="modal fade bd-example-modal-lg" id="viewModal{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Update: </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        {{$ticket->name}}<br>
                                                    {{$ticket->email}}<br>
                                                    {{$ticket->title}}<br>
                                                    {{$ticket->issue}}<br>
                                                    <img src="{{asset('ticket/'.$ticket->image)}}" class="img-circle" style="width:40px; height:30px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--END OF VIEW MODAL-->

                                        <!--DELETE MODAL-->
                                        <div class="modal fade" id="deleteModal{{$ticket->id}}">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 class="modal-title">Delete: {{$ticket->title}}</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>

                                                      <form method="POST" action="{{route('admin.deleteTicket')}}">
                                                          @csrf
                                                          <div class="modal-body">
                                                              <div class="row">
                                                                  <input type="text" name="id" value="{{$ticket->id}}" hidden="true">
                                                                  <div class="col-md-12">
                                                                      <p>Are you sure you want to delete this record ?</p>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="modal-footer justify-content-between">
                                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                              <button type="submit" class="btn btn-success">Delete</button>
                                                          </div>

                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                        <!--END OF DELETE MODAL-->

                                       
                                       
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