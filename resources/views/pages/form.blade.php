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
            <select name="title" class="form-control form-control-sm">
              <option>Open New Case</option>
              <option>Password Reset</option>
              <option>Account Activation</option>
              <option>Small select</option>
            </select>
        </div>

        <div class="col-md-8">
            <label for="exampleFormControlTextarea1" class="form-label">Issue</label>
            <textarea class="form-control" rows="5" placeholder="Describe your issue" name="issue"></textarea>
        </div>
        <div class="col-md-8">
        <label for="formFile" class="form-label">Attach an Image</label>
        <input class="form-control" type="file"  name="image">
        </div>
        <button type="submit" class="button">
          Send
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
          </svg>
        </button>
    </div>

</form>

@endsection