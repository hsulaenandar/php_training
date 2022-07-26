<?php
  include "config.php";
  
  //$conn->open();

  if(isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

   
  $sql = "INSERT INTO users (firstname, lastname, age, email, password, gender) 
          VALUES ('$first_name', '$last_name', '$age', '$email', '$password', '$gender')";

  $result = $conn->query($sql);

  if($result == TRUE) {
    echo "New record created succesfully";
  }
  else {
    echo "Error:" . $sql . "<br>". $conn->error;
  }

}
  $conn->close();

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_08_CRUD</title>
  </head>
  <style>
      fieldset{
      width : 500px;
    }
  </style>
  <body>
    <h2>Singup Form</h2>
    <form  action="" method="POST">
      <fieldset>
        <legend> Personal Information:</legend>
        First Name:<br>
        <input type="text" name="firstname" style= 'outline:none;'><br>
        Last Name:<br>
        <input type="text" name="lastname" style= 'outline:none;'><br>
        Age:<br>
        <input type="text" name="age" style= 'outline:none;'><br>
        Email:<br>
        <input type="email" name="email" style= 'outline:none;'><br>
        Password:<br>
        <input type="password" name="password" style= 'outline:none;'><br>
        Gender:<br>
        Male<input type="radio" name="gender" value="Male">
        Female<input type="radio" name="gender" value="Female">

        
        <br><br>
        <input type="submit" name="submit" value="submit">
        <input type="button" name="cancel" value="Cancel" onclick="location.href='view.php'">
      </fieldset>

    </form>
  </body>
  </html>
