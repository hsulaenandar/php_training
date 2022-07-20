
<!DOCTYPE html>
<html>
  
<body>
    <center>
        <h1>DISPLAY DATA PRESENT IN CSV</h1>
        <h3>Student data</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <input type="file" name="csv"/>
          <input type="submit" name="upload" value="Upload CSV"/>
        </form>
  
        <?php
        echo "<html><body><center><table>\n\n";

        $file = fopen("files/testExel.csv", "r");
        
        while (($data = fgetcsv($file)) !== false) {
  
            echo "<tr>";
            foreach ($data as $i) {
                echo "<td>" . htmlspecialchars($i) 
                    . "</td>";
            }
            echo "</tr> \n";
        }
  
        fclose($file);
  
        echo "\n</table></center></body></html>";
        ?>
    </center>
</body>
  
</html>