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
    <title>Edit Type</title>
</head>
<body>

<?php 

            //". $_FILES['img']['name']." 
        include 'connectdb.php';
        if (count ($_POST) > 0) {
        mysqli_query($db_handle, "UPDATE category SET name = '". $_POST['name']."' WHERE id = '". $_GET['id']."'");
        $message = "Updated";
        header ('Location: http://localhost:8080/Test/category', true);
    }

        $result = mysqli_query($db_handle, "SELECT * FROM category WHERE id = '". $_GET['id']. "'");
        $row = mysqli_fetch_array($result);

?>
<div class="container">

            <h3>Update type</h3>
            <form method ="POST">

            <div><?php if(isset($message)) { echo $message; } ?>
                </div>

                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <input  class="form-control"  name ="name" value="<?php echo $row['name']; ?>" >
                    </div>
   
                    <button type="submit" class="btn btn-primary" name="uploadclicked">Update</button>

            
            </form>
</div>
    
</body>
</html>
    
</body>
</html>