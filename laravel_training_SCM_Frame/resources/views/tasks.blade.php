@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 
    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- @include('common.errors') -->
 
        <!-- New Task Form -->

        @if(isset($task))
        <form method="post" action="{{route('task.update', $task->id ?? '')}}">
            @method('PUT')
        @else

        <form action="task" method="POST" class="form-horizontal">
        
        @endif
            {{ csrf_field() }}
 
            
            <!-- Task Name -->
            <div class="form-group">

                @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                @endif

                <label for="task" class="col-sm-3 control-label">Task</label>

             
                <div class="col-sm-6">
                    <input type="text" name="name" value="{{ old('task', isset($task) ? $task->name: '') }}" id="task-name" class="form-control">
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> @if(isset($task)) Update Task @else Add Task @endif
                    </button>

                </div>
            </div>
        </form>
    </div>
 
    <!-- TODO: Current Tasks -->

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <form action="/task/{{ $task->id }}/edit" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('GET') }}
                        
                                    <button>Edit Task</button>
                                </form>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <form action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                        
                                    <button>Delete Task</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    
@endsection