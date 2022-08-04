@extends('layouts.master')
@section('title') Subject List @endsection 

@section('content')

<div class="container mt-5">

@if(Session::has('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  @endif
  <div class="pg-link">
    <a class="btn btn-info" href="{{ url('/subject') }}" style="float:right; margin-right:350px;">Create</a>  </div>
  <table class="table">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Subject ID</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

    @php $no = 1; @endphp
    @foreach($subjects as $subject)
      <tr>
        <th scope="row">{{$no}}</th>
        <td>{{$subject->subject_name}}</td>
        <td>{{$subject->subject_id}}</td>
        <td><a class="btn btn-info" href='{{url("subject/edit/$subject->id")}}'>Edit</a>
        <a class="btn btn-danger" href='{{url("subject/delete/$subject->id")}}'>Delete</a></td>
      </tr>

    @php $no++;  @endphp  
    @endforeach 
    
    </tbody>
  </table>
</div>

@endsection