<!DOCTYPE html>
<html>
  
<body>
    <center>
        <h1>DISPLAY TextFile</h1>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="csv"/>
          <input type="submit" name="upload" value="Upload CSV"/>
        </form>
  
        <?php
        echo "<html><body><center><table>\n\n";
        if (isset($_POST['upload'])) {

           echo "uploaded";
            $myfile = fopen("files/text.txt", "r") or die("Unable to open file!");
            echo fread($myfile,filesize("files/text.txt"));
            fclose($myfile);
            
        }
      
         ?>
       
    </center>
</body>
  
</html>



