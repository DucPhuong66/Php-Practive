<?php
    include('connectdb.php');
    $sql = "DELETE FROM items WHERE id ='" . $_GET["id"] . "  '";

    if(mysqli_query($db_handle,$sql)) {
        echo "Deleted";
        header ('Location: http://localhost:8080/Test/', true);
    }else {
        echo "Error";
    }
 ?>

 