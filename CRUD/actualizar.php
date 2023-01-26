<?php 
include("../connection.php");

$id=$_GET['id'];

$sql="SELECT * FROM productos WHERE id='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="producto" placeholder="Nombre producto" value="<?php echo $row['producto']  ?>">
                                <input type="text" class="form-control mb-3" name="costo_compra" placeholder="Costo compra" value="<?php echo $row['costo_compra']  ?>">
                                <input type="text" class="form-control mb-3" name="precio_unidad" placeholder="Precio unidad" value="<?php echo $row['precio_unidad']  ?>">
                                <input type="text" class="form-control mb-3" name="precio_por_mayor" placeholder="Precio por mayor" value="<?php echo $row['precio_por_mayor']  ?>">
                                <input type="text" class="form-control mb-3" name="existencias" placeholder="Existencias" value="<?php echo $row['existencias']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>