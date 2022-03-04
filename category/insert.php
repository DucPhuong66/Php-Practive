



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Insert Category</title>
</head>
<body>


    <?php if (isset($_REQUEST['name'])): ?>

    <?php

    include 'connectdb.php';
    
    $name = $_REQUEST['name'];
    // Insert
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    if (mysqli_query($db_handle,$sql)){
        echo "<h3>Data stored</h3>";
        header ('Location: http://localhost:8080/Test/category', true);
    } else {
        echo "<h3>Error</h3>";
    }

     ?>

     <?php endif; ?>

    <div class="container">
    <h3>Insert</h3>
        <form method="POST">

                    
                    
                    <div class="form-group">
                        <label>Add Type</label>
                        <input  class="form-control" name="name" required>
                        
                    </div>

                    
                    
                    <button type="submit" name="uploadclicked" value="upload" class="btn btn-primary">Insert</button>
        </form>
    </div>
    
</body>
</html>
