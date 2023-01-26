<?php
include "/connection.php";

$producto=$_POST['producto'];
$costo_compra=$_POST['costo_compra'];
$precio_unidad=$_POST['precio_unidad'];
$precio_por_mayor=$_POST['precio_por_mayor'];
$existencias=$_POST['existencias'];


$sql="INSERT INTO productos (producto,costo_compra,precio_unidad,precio_por_mayor,existencias) VALUES('$producto','$costo_compra','$precio_unidad','$precio_por_mayor','$existencias')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: CRUD.php");
}else {
}
?>