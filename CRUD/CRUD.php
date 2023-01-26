<?php
include '../modelos/header.php';
include '../connection.php';

$sql="SELECT * FROM productos";
$query=mysqli_query($con,$sql);

//$row=mysqli_fetch_array($query);

?>
    <head>
        <title>CRUD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>

<body>
    
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">
                                    <b><label for="producto">Nombre producto</label></b>
                                    <input type="text" class="form-control mb-2" name="producto" placeholder="Nombre producto" id="producto" required>
                                    <b><label for="costo">Costo de compra</label></b>
                                    <input type="text" class="form-control mb-2" name="costo_compra" placeholder="Costo de compra" id="costo" required>
                                    <b><label for="p_uni">Precio por unidad (+25%)</label></b>
                                    <input type="text" class="form-control mb-2" name="precio_unidad" placeholder="Precio unidad" id="p_uni" required>
                                    <b><label for="p_paq">Precio por paquete (+20%)</label></b>
                                    <input type="text" class="form-control mb-2" name="precio_por_mayor" placeholder="Precio por mayor" id="p_paq" required>
                                    <b><label for="exis">Existencias</label></b>
                                    <input type="text" class="form-control mb-2" name="existencias" placeholder="Existencias" id="exis">
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre producto</th>
                                        <th>Costo compra</th>
                                        <th>Precio unidad</th>
                                        <th>Precio por mayor</th>
                                        <th>Existencias</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <td><?php  echo $row['id']?></td>
                                                <td><?php  echo $row['producto']?></td>
                                                <td class="moneda"><?php  echo $row['costo_compra']?></td>
                                                <td class="moneda"><?php  echo $row['precio_unidad']?></td>
                                                <td class="moneda"><?php  echo $row['precio_por_mayor']?></td>
                                                <td><?php  echo $row['existencias']?></td>
                                                <td><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></td>
                                                <td><button class="btn btn-danger" type="button" id="eliminar" onclick="confirmacionEliminar(<?php echo $row['id'] ?>)">Eliminar</button>                                       
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
            <?php include '../modelos/footer.php'; ?>
            <script>
                document.getElementById("costo").addEventListener("change", calcular_precios);
                
                function roundToMultipleOf100(value) {
                    return Math.round(value / 100) * 100;
                }

                function calcular_precios() {
                    document.getElementById("p_uni").value = roundToMultipleOf100(document.getElementById("costo").value*1.25+100);
                    document.getElementById("p_paq").value = roundToMultipleOf100(document.getElementById("p_uni").value*0.94);
                }

                const monedas = document.querySelectorAll('.moneda');
                monedas.forEach(moneda => {
                moneda.textContent = new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP',minimumFractionDigits: 0}).format(parseFloat(moneda.textContent));
                });


            </script>
    </body>
   