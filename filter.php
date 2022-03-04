<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

                    <div class="container">
                    <table class="table">
                                    <a href="./insert.php">Insert 

                                    </a>    
                                    

                                    
                                    
                                <thead>

                                <tr>    
                                            <th colspan="3"></th>
                                            <th scope="col">
                                            <form method="GET" action="filter.php">
                                                <label>Filter</label>                          
                                                <select name="type" class="form-control">
                                                    <option value="">--Type--</option>
                                                    <?php 
                                                    include 'connectdb.php';
                                                    
                                                    $sql_cat = mysqli_query($db_handle, "SELECT * FROM category ORDER BY id DESC");
                                                            while ($sql = mysqli_fetch_array($sql_cat)) { ?>
                                                                <option value="<?php echo $sql['id']; ?>"><?php echo $sql['name'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="text" name="search" placeholder="Search">
                                                <button class="btn btn-primary" value="find">
                                                    Find
                                                </button>
                                            </form>
                                            </th>
                                            
                                            
                                            <th colspan="4"></th>
                                            
                                            </tr>

                                            <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            </tr>
                                </thead>
                                    <tbody>
                                        <?php
                                        include 'connectdb.php';

                                        echo $type_id = $_GET['type'];

                                        $search = $_GET['search'];
                                        
                                        if($type_id == ''){
                                            $result =  mysqli_query($db_handle, "SELECT items.*, category.name AS cat_name 
                                                                        FROM items INNER JOIN category 
                                                                        ON items.cat_id = category.id 
                                                                        WHERE items.name = '$search' 
                                                                        ORDER BY id DESC");
                                        }elseif($search == ''){
                                            $result =  mysqli_query($db_handle, "SELECT items.*, category.name AS cat_name 
                                                                        FROM items INNER JOIN category 
                                                                        ON items.cat_id = category.id 
                                                                        WHERE items.cat_id = $type_id  
                                                                        ORDER BY id DESC");
                                        }else{
                                            $result =  mysqli_query($db_handle, "SELECT items.*, category.name AS cat_name 
                                                                        FROM items INNER JOIN category 
                                                                        ON items.cat_id = category.id 
                                                                        WHERE items.cat_id = $type_id AND items.name = '$search' 
                                                                        ORDER BY id DESC");
                                        }

                                        

                                       

                                        

                                        while($row = mysqli_fetch_array($result)){
                                        ?> 
                                                
                                                <tr>
                                                <th scope="row"><?php echo $row['id'];?></th>

                                                <td><img style="height: 100px; width: 120px" src="./upload/<?php echo $row['img'];?>" alt=""></td>

                                                <td><?php echo $row['name'];?></td>

                                                <td><?php echo $row['cat_name'];?></td>
                                                
                                                <td><?php echo $row['price'];?></td>
                                                <td><?php echo $row['des'];?></td>
                                                
                                                <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>

                                                <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                                

                                                </tr>
                                                
                                        <?php }?>
    
                                    </tbody>
                    </table>


                    </div>
</body>
</html>