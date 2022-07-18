<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
</head>
<body>
    <form action="" method="POST">
      <h2>Login Form</h2>
      <input type="email" name="email" placeholder="Email"><br><br>
      <input type="password" name="password" placeholder="Password"><br><br>
      <input type="submit" value="Login" name="login">
    </form>
</body>
</html>

<?php
session_start();

$errors=[];
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == 'admin@gmail.com' && $password == '123456'){
        $_SESSION['auth']  = true;
        header('location:logout.php');
    }
 }
?>
