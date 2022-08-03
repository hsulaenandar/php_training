@extends('layouts.master')
@section('title') Student List @endsection 

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
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone_No</th>
        <th scope="col">Address</th>
        <th scope="col">Subject</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

    @php $no = 1; @endphp
    @foreach($students as $student)
      <tr>
        <th scope="row">{{$no}}</th>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone_no}}</td>
        <td>{{$student->address}}</td>
        <td>{{$student->subject_id}}</td>
        <td><a href='{{url("edit/$student->id")}}'>Edit</a>
        <a href='{{url("/$student->id/delete")}}'>Delete</a></td>
      </tr>

    @php $no++;  @endphp  
    @endforeach 
    
    </tbody>
  </table>
</div>

@endsection