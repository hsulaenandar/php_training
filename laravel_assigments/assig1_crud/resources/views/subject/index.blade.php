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
        <td><a href='{{url("subject/edit/$subject->id")}}'>Edit</a>
        <a href='{{url("subject/$subject->id/delete")}}'>Delete</a></td>
      </tr>

    @php $no++;  @endphp  
    @endforeach 
    
    </tbody>
  </table>
</div>

@endsection