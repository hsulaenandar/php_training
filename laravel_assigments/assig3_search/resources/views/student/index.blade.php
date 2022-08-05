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

  <div class="search">
    <div class="pg_link" style="margin-left:60%;">
      <a class="btn btn-info"  href='{{url("/file-import")}}'>Export</a>
      <a class="btn btn-info" style="margin-left:25px;" href='{{url("/file-import")}}'>Import</a>
      <a class="btn btn-info" style="margin-left:25px;" href='{{url("/subject/index")}}'>Subject</a>
      <a class="btn btn-info" style="margin-left:25px;" href="{{ url('/create') }}">Create</a> 
    </div>
    <br>
        
    <form action="{{route('web.search')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <input type="search" name="name" style="outline:none;" placeholder="Search Name" aria-label="Search">
        <input type="search" name="address" style="outline:none; margin-left:25px;" placeholder="Search Address" aria-label="Search">
        <input type="search" name="start-date" style="outline:none; margin-left:25px;" placeholder="Start Date" aria-label="Search">
        <input type="search" name="end-date" style="outline:none; margin-left:25px;" placeholder="End Date" aria-label="Search">
        <span class="input-group-prepend">
            <button type="submit" class="btn btn-secondary" style="margin-left:25px;">Search</button>
        </span>
        
      </div>
      
    </form>
  
  </div>
  
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
        <td><a class="btn btn-warning" href='{{url("edit/$student->id")}}'>Edit</a>
        <a class="btn btn-danger" href='{{url("/delete/$student->id")}}'>Delete</a></td>
      </tr>

    @php $no++;  @endphp  
    @endforeach 
    
    </tbody>
  </table>
</div>

@endsection