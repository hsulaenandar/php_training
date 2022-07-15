<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_2</title>
</head>
<body>
  <?php
    $m=1; $n=5;
    for($i=1; $i<=5; $i++) {
        for($j=$i; $j<=4; $j++) 
        {
            echo "&nbsp;&nbsp;";
        }
        for($k=1; $k<=$m; $k++)  
        {
            echo "*";
        }
        for($c=$m; $c>1; $c--) 
        {
            echo "*";
        }
        echo "<br>";
        $m++;
    }
    
    for($i=1; $i<=5; $i++) {
        for($j=$i; $j>=1; $j--) 
        {
            echo "&nbsp;&nbsp;";
        }
        for($k=$n; $k>1; $k--) 
        {
            echo "*";
        }
        for($c=$n-1; $c>1; $c--) 
        {
            echo "*";
        }
        echo "<br>";
        $n--;
    } 
  ?>
</body>
</html>