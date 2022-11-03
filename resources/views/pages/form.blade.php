@extends('layouts.frontend')
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

<form action="{{route('pages.form')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="col-md-8">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="email@gmail.com" name="email">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlTextarea1" class="form-label">Issue</label>
            <textarea class="form-control" rows="5" placeholder="Describe your issue" name="issue"></textarea>
        </div>
        <div class="col-md-8">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file"  name="image">
        </div>
        <button type="submit" class="button">
            Senddata
        </button>
    </div>

</form>

@endsection