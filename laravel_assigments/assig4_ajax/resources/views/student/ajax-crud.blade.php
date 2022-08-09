<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 8 Ajax CRUD Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Laravel 8 Ajax Book CRUD Tutorial</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
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
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone_no }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->subject_id }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-warning edit" data-id="{{ $student->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $student->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxBookModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Book Name" value="" maxlength="50" >
                </div>
              </div>  

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Book Code" value="" maxlength="50" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Phone No</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter author Name" value="" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter author Name" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-12">
                  <select class="form-control" name="subject" id="subject">
                    <option selected>Choose Select Subject</option>
                    @foreach($subject as $sub)
                      <option value="{{$sub->subject_name}}">{{$sub->subject_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Book");
       $('#ajax-book-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {

        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"PUT",
            url: "http://127.0.0.1:8000/api/update/",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#name').val(res.name);
              $('#email').val(res.email);
              $('#phone_no').val(res.phone_no);
              $('#address').val(res.address);
              $('#subject').val(res.subject);
           }
        });

    });

    $('body').on('click', '.delete', function () {

       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"DELETE",
            url: "http://127.0.0.1:8000/api/delete/",
            data: { id: id },
            dataType: 'json',
            success: function(res){

              window.location.reload();
           }
        });
       }

    });

    $('body').on('click', '#btn-save', function (event) {

          var id = $("#id").val();
          var name = $("#name").val();
          var email = $("#email").val();
          var phone_no = $("#phone_no").val();
          var address = $("#address").val();
          var subject = $("#subject").val();

          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "http://127.0.0.1:8000/api/store/",
            data: {
              id:id,
              name:name,
              email:email,
              phone_no:phone_no,
              address:address,
              subject:subject,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });

    });

});
</script>
</body>
</html>