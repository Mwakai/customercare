@extends('layouts.frontend')
@section('content')

<form action="" method="POST">
    @csrf
    <div class="container">
        <div class="col-md-8">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="email@gmail.com">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="col-md-8">
            <label for="exampleFormControlTextarea1" class="form-label">Issue</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Describe your issue"></textarea>
        </div>
        <div class="col-md-8">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
        </div>
        <button type="submit" class="button">
            Senafa
        </button>
    </div>

</form>





@endsection