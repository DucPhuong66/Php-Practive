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
        
        include 'connectdb.php';
        if (count ($_POST) > 0) {
        mysqli_query($db_handle, "UPDATE post set  name = '". $_POST['name']."',
                                                   
                                                    content = '". $_POST['content']. "' ,
                                                    WHERE id = '". $_GET['id']."'");
        $message = "Updated";
        header ('Location: http://localhost:8080/Test/', true);
    }
        $result = mysqli_query($db_handle, "SELECT * FROM post WHERE id = '". $_GET['id']."'");
        $row = mysqli_fetch_array($result);

?>
<div class="container">
            <h3>Update</h3>
            <form method ="POST" enctype="multipart/form-data">

            <div><?php if(isset($message)) { echo $message; } ?>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input  class="form-control"  name ="name" value="<?php echo $row['name']; ?>" >
                    </div>

                    <div class="form-group">
                        <label>Category</label>  <br>               
                            <?php 
                            include 'connectdb.php';
                            
                            $data_fill = mysqli_query($db_handle, "SELECT post_inner_postcat.postcat_id AS cat_id 
                                                                        FROM post INNER JOIN post_inner_postcat 
                                                                        ON post.id = post_inner_postcat.post_id 
                                                                        WHERE post_inner_postcat.post_id =  '". $_GET['id']. "'");

                            while ($data  = mysqli_fetch_array($data_fill)){   
                                $sql_cat = mysqli_query($db_handle, "SELECT * FROM post_cat ORDER BY id DESC");
                                // echo $data('cat_id');
                                while ($sql = mysqli_fetch_array($sql_cat)) {
                                    echo $sql['id'];
                                    ?>   
                                    <input type="checkbox" name="cat_name" value="<?php echo $sql['id'];?>" <?= $data['cat_id'] == $sql['id'] ? ' checked="checked"' : '';?>  >
                                    <?php echo $sql['name'];?>                           
                            <?php }}; ?> 
                    </div>
                    <div class="form-group">
                        <label >Content</label>
                        <input  class="form-control"  name="content" value="<?php echo $row['content']; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="">Update</button>

            
            </form>
</div>
    
</body>
</html>
    
</body>
</html>