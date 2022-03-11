<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Insert</title>
</head>
<body>

<?php 

            if (isset($_POST['uploadclicked']))
            {
                $name_img = "";
                // Nếu người dùng có chọn file để upload
                if (isset($_FILES['img']))
                {
                    // Nếu file upload bị lỗi,
                    // Tức là thuộc tính error > 0
                    if ($_FILES['img']['error'] > 0)
                    {
                        echo 'File Upload Bị Lỗi';
                    }
                    else{
                        // Upload file
                        $name_img = $_FILES['img']['name'];
                        move_uploaded_file($_FILES['img']['tmp_name'], './upload/'.$name_img);                                 
                        echo 'File Uploaded';
                    }
                } 
                // không chọn file
                $img = ($name_img!="") ?  $name_img : $_POST['img_hidden'];
                
            }


            //". $_FILES['img']['name']."
        
        include 'connectdb.php';
        if (count ($_POST) > 0) {
        mysqli_query($db_handle, "UPDATE items set  img = '".$img."',
                                                    name = '". $_POST['name']."',
                                                    price = '". $_POST['price']."',
                                                    des = '". $_POST['des']. "',
                                                    cat_id = '". $_POST['cat_id']. "' 
                                WHERE id = '". $_GET['id']."'");
        $message = "Updated";
        header ('Location: http://localhost:8080/Test/', true);
    }

        $result = mysqli_query($db_handle, "SELECT * FROM items WHERE id = '". $_GET['id']. "'");
        $row = mysqli_fetch_array($result);
?>
<div class="container">

            <h3>Update</h3>
            <form method ="POST" enctype="multipart/form-data">

            <div><?php if(isset($message)) { echo $message; } ?>
                </div>

                    <div class="form-group">
                        <label>Image <?php echo $row['img']; ?></label> 
                        <input type="file" class="form-control" name="img" require> 
                        <input type="hidden" value="<?php echo $row['img']; ?>" class="form-control" name="img_hidden"> 
                    </div>

                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input  class="form-control"  name ="name" value="<?php echo $row['name']; ?>" >
                    </div>

                    <div class="form-group">
                        <label>Type</label>   
                        <select class="form-control" name="cat_id">                       
                            <?php 
                            include 'connectdb.php';
                            
                            $sql_cat = mysqli_query($db_handle, "SELECT * FROM category ORDER BY id DESC");
                                    while ($sql = mysqli_fetch_array($sql_cat)) { ?> 
                                        
                                        <option value="<?php echo $sql['id'];?>" <?= $row['cat_id'] == $sql['id'] ? ' selected="selected"' : '';?>><?php echo $sql['name'];?></option>
                                        
                            <?php } ?>                       
                        </select>
                    </div>
                        
                    

                    <div class="form-group">
                        <label >Price</label>
                        <input  class="form-control"  name ="price"  value="<?php echo $row['price']; ?>">
                    </div>

                    <div class="form-group">
                        <label >Description</label>
                        <input  class="form-control"  name="des" value="<?php echo $row['des']; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="uploadclicked">Update</button>

            
            </form>
</div>
    
</body>
</html>
    
</body>
</html>