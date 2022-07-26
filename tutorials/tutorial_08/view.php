<?php
  include "config.php";

  $sql = "SELECT * FROM users";

  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Page</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div style="margin-top:20px; margin-bottom:20px;">
      <h2 style="display:inline-block;">Users</h2>
      <input type="button" name="create" value="Create" onclick="location.href='create.php'" class="btn btn-info" style="float:right; margin-right:110px;" >
    </div>
    
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($result->num_rows>0) {
            while($row = $result->fetch_assoc()) {
        ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">
                Edit</a>&nbsp:<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">
                Delete</a></td>
              </tr>  
              <?php }
          }
          ?>
          
      </tbody>

    </table>

  </div>
</body>
</html>