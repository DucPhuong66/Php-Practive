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
        mysqli_query($db_handle, "UPDATE post set   name  = '". $_POST['name']."',
                                                    content = '". $_POST['content']. "' 
                                                    WHERE id = '". $_GET['id']."'");
        
        // header ('Location: http://localhost:8080/Test/post', true);
    }
        $result = mysqli_query($db_handle, "SELECT * FROM post WHERE id = '". $_GET['id']."'");
        $row = mysqli_fetch_array($result);

?>
<div class="container">
            <h3>Update</h3>
            <form method ="POST" enctype="multipart/form-data">

            <div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input  class="form-control"  name ="name" value="<?php echo $row['name']; ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label>Category</label>  <br>    
                            
                            <?php 
                            // handel update category
                            include 'connectdb.php';
                            if(isset($_POST['uploadclicked'])){
                                $sql = "DELETE FROM post_inner_postcat WHERE post_id ='" . $_GET["id"] . "'";
                                if(mysqli_query($db_handle,$sql)) {
                                    echo "Deleted";
                                }
                                
                                $cat = (isset($_POST['cat_name'])) ? $_POST['cat_name'] : "";
                                // print_r($cat); 
                                $id_post = $_GET["id"];
                                foreach ($cat as $value){
                                    $sql = "INSERT INTO post_inner_postcat (post_id, postcat_id) VALUES ('$id_post', '$value')"; 
                                    mysqli_query($db_handle,$sql);
                                    header ('Location: http://localhost:8080/Test/post', true);
                                }; 

                            };
                        
                            $data_fill = mysqli_query($db_handle, "SELECT * FROM post_cat ORDER BY id DESC");
                            
                            while ($data  = mysqli_fetch_array($data_fill)){ 
                                 $cat_id = $data['id'];
                                $sql_cat = mysqli_query($db_handle, "SELECT * FROM post_inner_postcat WHERE post_id = '". $_GET['id']."' AND postcat_id = $cat_id"); 
                                $rowcount = mysqli_num_rows($sql_cat);
                             
                                $checked = ($rowcount > 0) ? "checked" : "";
                            ?>                                        
                            <input type="checkbox" name="cat_name[]" value="<?php echo $data['id'] ?>" <?php echo $checked;?> > 
                                    <?php echo $data['name'];?>

                     <?php }; ?> 
                    

                    </div>
                    <div class="form-group">
                        <label >Content</label>
                        <input  class="form-control"  name="content" value="<?php echo $row['content']; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="uploadclicked">Update</button>

            
            </form>
</div>
    
</body>
</html>
    
</body>
</html>