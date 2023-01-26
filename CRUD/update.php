<?php

include 'connection.php';

$id=$_POST['id'];
$producto=$_POST['producto'];
$costo_compra=$_POST['costo_compra'];
$precio_unidad=$_POST['precio_unidad'];
$precio_por_mayor=$_POST['precio_por_mayor'];
$existencias=$_POST['existencias'];

$sql="UPDATE productos SET producto='$producto',costo_compra='$costo_compra',precio_unidad='$precio_unidad',precio_por_mayor='$precio_por_mayor',existencias='$existencias' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: CRUD.php");
    }
?>