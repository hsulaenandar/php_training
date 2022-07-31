<?php
require_once "config.php";
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
    if(isset($_POST['send'])){
        $email = $_POST['email'];

        require_once "vendor/autoload.php";
        require_once "vendor/PHPMailer/PHPMailer/src/PHPMailer.php";
        require_once "vendor/PHPMailer/PHPMailer/src/SMTP.php";
        require_once "vendor/PHPMailer/PHPMailer/src/Exception.php";
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        
        //smtp setting
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "kayk08701@gmail.com";
        $mail->Password = 'fqtl ilmw ogul gbwv';
        $mail->Port = 25;
        $mail->SMTPSecure = "tls";

        //email setting
        $mail->setFrom('kayk08701@gmail.com','PHPMailer Testing');
        $mail->addAddress($email,'Kay Kay');
        $mail->Subject = "I am testing phpmailer.";
        $mail->Body = "<a href='http://localhost:8000/resetpass.php'>Reset Password Form Link</a>";
        $mail->AltBody = "This is the body in plain text for non-html mail clients";

        if(!$mail->send()){
            echo "Message could not be sent.";
            echo "Mailer Error : ". $mail->ErrorInfo;
        }else{
            echo "Message has been sent";
        }
    }
    ?>
    <h1 style="text-align:center;">Forgot Password Form</h1>
    <form action="" method="post">
      <fieldset>
        <legend>You can send mail</legend>
        <div>
            Email:<br>
            <input type="email" name="email" style="outline:none;" placeholder="Enter your recovery email" required><br><br>
            <input type="submit" name="send" value="Send Mail" class="btn-submit">
            <input type="submit" name="login" value="Login" class="btn-submit" onclick="location.href='login.php'">
        </div>
      </fieldset>
    </form>
</body>
</html>