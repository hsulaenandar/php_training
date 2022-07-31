<?php
  include "config.php";

  if(!empty($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

     
  $sql = "SELECT * FROM users WHERE email='$email' and password='$password'"; 
  $result = $conn->query($sql);
  $count = mysqli_num_rows($result);
  if($count>0) {
    echo "Login Successful";
    header('location:create.php');
  }
  else {
    echo "Login Not Successful";
  }
  }
  
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_10Login</title>
    <style>
      .login {
        width : 500px;
        margin : 50px auto;
      }
      .btn-submit {
        background: #149414;
        color: #FFFFFF;
        padding: 5px 15px;
        border-radius: 5px;
        cursor: pointer;
      }
      .btn-submit:hover {
        background: #FFFFFF;
        color: #149414;
      }
      .err-result {
        color : red;
      }
    </style>
</head>
<body>
    <form action="" method="POST" >
      <fieldset class="login">
        <legend><h2>Login Form</h2></legend>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" value="Login" name="login" class="btn-submit"><br><br>
        <a href="forgotpass.php">Forgot your password?</a>
      </fieldset>
    </form>
</body>
</html>


