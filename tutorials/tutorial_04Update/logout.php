<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04Update</title>
    <style>
      .logout {
        width : 500px;
        margin : 50px auto;
      }
      .btn-logout {
        background: #149414;
        color: #FFFFFF;
        padding: 5px 15px;
        border-radius: 5px;
        cursor: pointer;
      }
      .btn-logout:hover {
        background: #FFFFFF;
        color: #149414;
      }
    </style>
</head>
<body>
    <form action="login.php" method="POST" class="logout">
      <h3>Login successful!!</h3>
      <input type="submit" value="Logout" class="btn-logout">
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

