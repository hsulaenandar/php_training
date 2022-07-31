<?php
require_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_10</title>
    <style>
      fieldset{
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
    </style>
</head>
<body>
    <?php
    $errorMessage = 0;
    if(isset($_POST['update'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM users where email='$email'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        if(!$row){
            $errorMessage = 1;
            $_SESSION['error']['Message']= "user ma hote buu register ayin lote yan";
            header("location:create.php");         
        }else{
            print_r($row);
            $id = $row['id'];       
            $newPassword = $_POST['new-pwd']; 
            $confirmPassword = $_POST['confirm-pwd']; 
            if($newPassword == $confirmPassword){
                $spass = password_hash($newPassword,PASSWORD_DEFAULT);                 
                $sql = "UPDATE user SET password='$spass' WHERE  id=$id";
                if(mysqli_query($conn,$sql)){
                    $_SESSION['success']['message'] =  "Password Update Successfully!";
                    header("location:index.php");
                }else{
                    echo "Query Fail : ".mysqli_error();
                }
            }else{
                echo "Password don't match";
            }

        } 
    }
    ?>
    <h1 style="text-align:center;">Reset Password Form</h1>      
    <form action="" method="post">
    <fieldset>
        <legend>You can reset password</legend>
        <label for="email">Email:</label><br>
        <input type="email" name="email" style="outline:none;"><br><br>

        <label for="password">New Password:</label><br>
        <input type="password" name="new-pwd" style="outline:none;"><br><br>

        <label for="password">Confirm Password:</label><br>
        <input type="password" name="confirm-pwd" style="outline:none;"><br><br><br>

        <input type="submit" name="update" value="Update Password" class="btn-submit">
        
       
    </fieldset>
    </form>
</body>
</html>