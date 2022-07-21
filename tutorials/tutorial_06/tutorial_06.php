<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_06</title>
    <style>
        body {
            color: #b06055;
        }
        section {
            text-align:center;
            margin: 100px auto;
            border: 1px solid #b06055;
            width:800px;
            background: #efefef;
            padding: 30px;
        }
        .uploadFolder {
            padding: 10px 80px;
            outline: none;
        }

        .btnSubmit {
            background:#CF9F99;
            color:#000000;
            padding:8px 20px;
            margin-bottom: 20px;
        }
        .btnSubmit:hover {
            background: #ffffff;
            color: #b06055;
        }
    </style>
</head>

<body>

    <section>
        <h2>Image Upload</h2>
        <form action="" method="post" enctype="multipart/form-data">
                <label for="file">Choose Image : </label>
                <input type="file" name="image" class="uploadImg" accept="image/png,image/gif,image/jpg,image/jpeg"><br><br>        
                <input type="text" name = "folder_name" placeholder="Please Enter Folder Name" class="uploadFolder" required><br><br>       
                <input type="submit" name="submit" value="Save" class="btnSubmit"><br>
                <?php
                    if(isset($_POST['submit'])){

                        $folder_name = $_POST['folder_name'];
                        mkdir($folder_name);

                        $image =$folder_name."/". $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $image);
                        
                        $save = "Image save successful!";
                        echo $save;

                    }
                ?>

        </form>
         
    </section>
   
    
</body>
</html>