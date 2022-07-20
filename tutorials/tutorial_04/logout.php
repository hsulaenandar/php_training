<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
</head>
<body>
    <form action="login.php" method="POST">
      <h3>Login successful!!</h3>
      <input type="submit" value="Logout">
    </form>
</body>
</html>

<?php
    session_start();
    if(!isset($_SESSION['auth'])){
        header('location: login.php');
        die();
    }
?>

