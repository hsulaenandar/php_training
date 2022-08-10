@extends('layouts.master')
@section('title') Student Create(Add) @endsection 

@section('content')

<div class="container">
<form class="col-md-6 offset-3" method="post" action="{{ url('/store') }}">

  @if(Session::has('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  @endif

  <h2>Add New Student</h2>
  @if($errors->any())
  @foreach($errors->all() as $err) 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{$err}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
 

  @endforeach
  @endif  
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group mt-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    
  </div>
  <div class="form-group mt-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group mt-3">
    <label for="phone_no">Phone Number</label>
    <input type="text" class="form-control" name="phone_no" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone no">
    
  </div>
  <div class="form-group mt-3">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
    
  </div>
  <div class="form-group mt-3">

  <select class="form-control" name="subject" id="inputGroupSelect01">
    <option selected>Choose Select Subject</option>
    @foreach($subjects as $sub)
      <option value="{{$sub->subject_name}}">{{$sub->subject_name}}</option>
    @endforeach
  </select>
    
  </div>
  <br>
  <button type="submit" class="btn btn-success">Save</button>
  <a class="btn btn-info" href="{{ url('/') }}">View</a>
</form>
</div>

@endsection