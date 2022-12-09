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
                @if(!empty($total))
                <h3 class="card-title"><b>{{$total}} &nbsp; Open Ticket</b></h3>
                @else
                <h3 class="card-title"><b>Open Ticket</b></h3>
                @endif
               
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
                                
                                <div class="nav nav-tabs card-header-tabs">
                                    @if(!empty($total))
                                    <h3>{{$total}} Tickets</h3>
                                    @else
                                    <h3>0 Tickets</h3>
                                    @endif

                                    <div class="form-inline" style="float:right !important;">
                                        <form action="{{route('admin.homeSearch')}}" method="GET">
                                            @csrf
                                            <input type="text" class="form-control" name="table_search" placeholder="Search">

                                            <button type="submit" class="btn btn-default" type="get" >
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                
                                </div>      

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
                                                    <i class="fa fa-eye"></i>&nbsp;View

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
                                                        <h4>{{$ticket->id}}&nbsp;{{$ticket->title}} </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="POST" action="{{route('admin.deleteTicket')}}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <input type="text" name="id" value="{{$ticket->id}}" hidden="true">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Name</label>
                                                                        <input type="text" class="form-control" value="{{$ticket->name}}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Email</label>
                                                                        <input type="text" class="form-control" value="{{$ticket->email}}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Title</label>
                                                                        <input type="text" class="form-control" value="{{$ticket->title}}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="name">Issue</label>
                                                                        <textarea class="form-control" name="issue" readonly>
                                                                            {{$ticket->issue}}

                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <a href="#" data-toggle="modal" data-target="#myModal{{$ticket->id}}">
                                                                    Click to view image
                                                                </a>
                                                                <div class="col-md-12">
                                                                
                                                                      <img src="{{asset('ticket/'.$ticket->image)}}" width="150px" height="140px">
                                                                  </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" formaction="mailto:{{$ticket->email}}">
                                                                    Reply
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                                                    </svg>
                                                                </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--VIEW IMAGE MODAL-->
                                        <div style="min-width:90%;" class="modal fade bd-example-modal-lg" id="myModal{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Image Title</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <img class="img-fluid" src="{{asset('ticket/'.$ticket->image)}}" alt="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <!--END OF VIEW IMAGE MODAL-->

                        
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