<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Category</title>
</head>
<body>

                    <div class="container">
                    <table class="table">
                                    <a href="./insert.php">Insert type</a>    
                                    
                                <thead>
                                            <tr>
                                            <th colspan="3"></th>
                                            <th scope="col">
                                            </th>                                           
                                            <th colspan="4"></th>
                                            </tr>
                                            <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            
                                            </tr>
                                </thead>
                                    <tbody>
                                        <?php
                                        include 'connectdb.php';

                                        $result =  mysqli_query($db_handle, "SELECT * FROM category ORDER BY id DESC");

                                        

                                        while($row = mysqli_fetch_array($result)){
                                        ?> 
                                                
                                                <tr>
                                                <th scope="row"><?php echo $row['id'];?></th>

                                               


                                                <td><?php echo $row['name'];?></td>
                                                
                                                
                                                
                                                <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>

                                                <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                                

                                                </tr>
                                                
                                        <?php }?>
    
                                    </tbody>
                    </table>


                    </div>
</body>
</html>