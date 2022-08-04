@extends('layouts.master')
@section('title') Subject Edit @endsection 

@section('content')

<div class="container">
<form class="col-md-6 offset-3" method="post" action='{{url("subject/update/$subject->id")}}'>

  @if(Session::has('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  @endif

  <h2>Edit Subject</h2>
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
    <label for="subject_name">Subject Name</label>
    <input type="text" class="form-control" name="subject_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$subject->subject_name}}">
    
  </div>
  <div class="form-group mt-3">
    <label for="subject">Subject ID</label>
    <input type="text" class="form-control" name="subject_id" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$subject->subject_id}}">
    
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection