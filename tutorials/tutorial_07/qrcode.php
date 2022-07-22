<?php 
    include('phpqrcode/qrlib.php'); 
    if(isset($_POST['generate_text'])){
        $text=$_POST['qr_text'];

        $file = 'images/'.$text.".png";
        
        QRcode::png($text, $file);
        
        echo "<img src='".$file."'>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_07</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  
</head>
<body>
  <div class="bg">
    <div class="container" id="panel">
      <br><br><br>
      <div class="row">
        <div class="col-md-6 offset-md-3" style="background-color: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
          <div class="panel-heading">
            <h1>Generate QR-code in PHP</h1>
          </div>
          <hr>
          <form action="" method="post">
            <?php 
             $value = "";
             ?>
            <input type="text" class="form-control" style="border-radius: 0px;" placeholder="Text..." name="qr_text" value= "">
            <br>
            <input type="submit" class="btn btn-md btn-danger btn-block" name="generate_text" value="Generate"><br><br>
            <a href="qrcode.php">Generate One More...</a>
          </form>
        </div>
      </div>

    </div>
  </div>
</body>
</html>