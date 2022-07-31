<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_03Update</title>
  <style>
    fieldset{
      width : 500px;
      margin : 50px auto;
      font-weight: bold;
    }
    .btn-submit {
      background: #FF6700;
      color: #FFFFFF;
      padding: 5px;
      cursor: pointer;
    }
    .btn-submit:hover {
      background: #FFFFFF;
      color: #FF6700;
    }
    .output {
      color : #FF6700;
    }
  </style>  
</head>
<body>
  <form action=" " method="post">
    <fieldset>
      <legend><h2>Calculate Age Form</h2></legend>
      <h4>Choose Date:</h4>
      <input type="date" name="dob"><br><br>
      <input type="submit" name="submit" value="Submit" class="btn-submit"><br><br>
      
      <div class=output>
      <?php
        if ($_POST['submit']) {
          $birthDate = $_POST['dob'];
          $birthNow = date('Y');
          if (date('Y',  strtotime($birthDate)) < date('Y')) {
            $diff = ($birthNow - date('Y',strtotime($birthDate)));
            echo "Your age is $diff years old.";
          } else{
            echo "Birhtday isn't correct!!";
            
          }
        }
      ?> 
      </div>
      

    </fieldset>
	</form>
  
</body>
</html>