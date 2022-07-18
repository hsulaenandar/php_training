<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_03</title>
</head>
<body>
  <form action=" " method="post">
    <h2>Calculate Age Form</h2><br>
    <input type="date" name="dob"><br><br>
    <input type="submit" name="submit" value="Submit"><br><br>
	</form>
  <?php
    if ($_POST['submit']) {
      $birthDate = $_POST['dob'];
      $birthNow = date('Y');
      if (date('Y',  strtotime($birthDate)) < date('Y')) {
        $diff = ($birthNow - date('Y',strtotime($birthDate)));
        echo "Age is $diff years old.";
      } else{
        echo "Birhtday isn't correct!!";
        
      }
    }
  ?> 
</body>
</html>