



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


    <?php if (isset($_REQUEST['name']) && isset($_REQUEST['price']) && isset($_REQUEST['des'])): ?>

    <?php

    include 'connectdb.php';
     // Xử Lý Upload
    // Nếu người dùng click Upload
    if (isset($_POST['uploadclicked']))
    {
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
                move_uploaded_file($_FILES['img']['tmp_name'], './upload/'.$_FILES['img']['name']);
                echo 'File Uploaded';
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
    
    $img = $_FILES['img']['name'];
    $name = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    $price = $_REQUEST['price'];
    $des = $_REQUEST['des'];
    // Insert
    $sql = "INSERT INTO items (name, price, des, img, cat_id) VALUES ('$name', '$price', '$des', '$img', '$type')";
    if (mysqli_query($db_handle,$sql)){

        header ('Location: http://localhost:8080/Test/', true);
    } else {
        echo "<h3>Error</h3>";
    }

     ?>

     <?php endif; ?>

    <div class="container">
        <form method="POST" enctype="multipart/form-data">

                    <h3>Insert</h3>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="img" required>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input  class="form-control" name="name" required>
                        
                    </div>
                     
                    <div class="form-group">
                         <label>Type</label> 
                                <div class="form-group"> 
                                    
                                    <?php 
                                    include 'connectdb.php';
                                    $sql_cat = mysqli_query($db_handle, "SELECT * FROM category ORDER BY id DESC");
                                            while ($row = mysqli_fetch_array($sql_cat)) { ?>
                                                <input type="checkbox" name="type" value="<?php echo $row['id']; ?>" /> <?php echo $row['name'];?>
                                    <?php } ?>
                                    
                                </div>
                            
                    </div>


                    <div class="form-group">
                        <label>Price</label>
                        <input  class="form-control" name="price" required>
                    </div>
    
                    <div class="form-group">
                        <label>Description</label>
                        <input  class="form-control"  name="des" required>
                    </div>
                    
                    <button type="submit" name="uploadclicked" value="upload" class="btn btn-primary">Insert</button>
        </form>
    </div>
    
</body>
</html>
