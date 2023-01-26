<?php 
include '../connection.php';

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
                <h1>Ingrese datos</h1>
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                <b><label for="producto">Nombre producto</label></b>
                                <input type="text" class="form-control mb-3" name="producto" placeholder="Nombre producto" id="producto" required value="<?php echo $row['producto']  ?>">
                                <b><label for="costo">Costo de compra</label></b>
                                <input type="text" class="form-control mb-3" name="costo_compra" placeholder="Costo compra" id="costo" required value="<?php echo $row['costo_compra']  ?>">
                                <b><label for="p_uni">Precio por unidad (+25%)</label></b>
                                <input type="text" class="form-control mb-3" name="precio_unidad" placeholder="Precio unidad" id="p_uni" required value="<?php echo $row['precio_unidad']  ?>">
                                <b><label for="p_may">Precio por mayor (+20%)</label></b>
                                <input type="text" class="form-control mb-3" name="precio_por_mayor" placeholder="Precio por mayor" id="p_may" required value="<?php echo $row['precio_por_mayor']  ?>">
                                <b><label for="exis">Existencias</label></b>
                                <input type="text" class="form-control mb-3" name="existencias" placeholder="Existencias" id="exis" value="<?php echo $row['existencias']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
                <?php include '../modelos/footer.php'; ?>
    </body>
</html>