<?php

include "/connection.php";


$id=$_GET['id'];

$sql="DELETE FROM productos WHERE id='$id'; ";
$sql.="ALTER TABLE productos AUTO_INCREMENT = 1;";

$query=mysqli_multi_query($con,$sql);

    if($query){
        Header("Location: CRUD.php");
    }


?>
