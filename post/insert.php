



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


<?php if (isset($_POST['uploadclicked'])): ?>

<?php

include 'connectdb.php';

$post_name = $_POST['post_name'];
$post_content = $_POST['content_name'];
$cat_name = (isset($_POST['cat_name'])) ? $_POST['cat_name'] : "";


// Insert
$sql_post = "INSERT INTO post (name, content) VALUES ('$post_name', '$post_content')";
$data_post = mysqli_query($db_handle,$sql_post);
$id_post_insert = mysqli_insert_id($db_handle);
// echo 'id post insert: ' .$id_post_insert;

if($data_post):
foreach ($cat_name as $value){
    $sql = "INSERT INTO post_inner_postcat (post_id, postcat_id) VALUES ('$id_post_insert', '$value')"; 
    mysqli_query($db_handle,$sql);
}; 
endif;

header ('Location: http://localhost:8080/Test/post', true);

// if (mysqli_query($db_handle,$sql)){
//     //header ('Location: http://localhost:8080/Test/post', true);
// } else {
//     echo "<h3>Error</h3>";
// }

    ?>

    <?php endif; ?>

<div class="container">
    <form method="POST" enctype="multipart/form-data">

                <h3>Insert</h3>

                <!-- <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="img" required>
                </div> -->

                <div class="form-group">
                    <label>Name</label>
                    <input  class="form-control" name="post_name" required>
                    
                </div>
                    
                <div class="form-group">
                        <label>Category</label> 
                            <div class="form-group">                                     
                                <?php 
                                include 'connectdb.php';
                                $sql_cat = mysqli_query($db_handle, "SELECT * FROM post_cat ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($sql_cat)) { ?>
                                            <input type="checkbox" name="cat_name[]" value="<?php echo $row['id']; ?>" /> <?php echo $row['name'];?>
                                <?php } ?>
                                
                            </div>
                        
                </div>


                <div class="form-group">
                    <label>Content</label>
                    <input  class="form-control" name="content_name" required>
                </div>
                
                <button type="submit" name="uploadclicked" value="upload" class="btn btn-primary">Insert</button>
    </form>
</div>

</body>
</html>
