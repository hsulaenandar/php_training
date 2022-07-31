<?php
  include "config.php";
  $user_id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id = $user_id ";

  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $gender = $row['gender'];

  if(isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    // $user_id = $_POST['user_id'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    print_r($_POST);

    $sql = "UPDATE users 
            SET firstname = '$firstname', lastname = '$lastname', age = '$age', email = '$email', password = '$password', gender = '$gender'
            WHERE id = '$user_id' ";

    $result = $conn->query($sql);
    
    if($result == TRUE) {
      echo "Record Updated Succesfully";
    }
    else {
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }


  ?>


    <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>
      <style>
        fieldset{
          width : 500px;
        }
      </style>
      <body>
    
        <h2>User Update Form</h2>
        
        <form action="" method="POST">
        <fieldset>
        <legend> Personal Information:</legend>
        
        First Name:<br>        
        <input type="text" name="firstname" style= 'outline:none;' value="<?php echo $row['firstname']; ?>"><br>
        
        Last Name:<br>
        <input type="text" name="lastname" style= 'outline:none;' value="<?php echo $row['lastname']; ?>"><br>
        Age:<br>
        <input type="text" name="age" style= 'outline:none;' value="<?php echo $row['age']; ?>"><br>
        Email:<br>
        <input type="email" name="email" style= 'outline:none;' value="<?php echo $row['email']; ?>"><br>
        Password:<br>
        <input type="password" name="password" style= 'outline:none;' value="<?php echo $row['password']; ?>"><br>
        Gender:<br>
        <input type="radio" name="gender" style= 'outline:none;' value="Male" <?php if($gender == 'Male') { echo "checked";} ?> >Male
        <input type="radio" name="gender" style= 'outline:none;' value="Female" <?php if($gender == 'Female') { echo "checked";} ?> >Female
        <br><br>
        <input type="submit" name="update" value="Update">
        <input type="button" name="cancel" value="Cancel" onclick="location.href='view.php'">

        </fieldset>
        </form>
    </body>
    </html>
    
