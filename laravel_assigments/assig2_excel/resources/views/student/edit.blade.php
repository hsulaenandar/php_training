@extends('layouts.master')
@section('title') Student Edit @endsection 

@section('content')

<div class="container">
<form class="col-md-6 offset-3" method="post" action='{{url("update/$student->id")}}'>

  @if(Session::has('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  @endif

  <h2>Edit Student</h2>
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
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->name}}">
    
  </div>
  <div class="form-group mt-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->email}}">
    
  </div>
  <div class="form-group mt-3">
    <label for="phone_no">Phone Number</label>
    <input type="text" class="form-control" name="phone_no" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->phone_no}}">
    
  </div>
  <div class="form-group mt-3">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->address}}">
    
  </div>
  <div class="form-group mt-3">
    <select class="form-control" name="subject" id="inputGroupSelect01">
      <option selected>Choose Select Subject</option>
      @foreach($subjects as $sub)
        <option value="{{$sub->subject_id}}">{{$sub->subject_name}}</option>
      @endforeach
    </select>
    
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection