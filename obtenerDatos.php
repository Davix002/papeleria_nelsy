<?php

    include '../connection.php';

    $buscarTexto = $_POST['buscadorvoz'];

    $query = 'SELECT * FROM productos WHERE producto like "%' . $buscarTexto . '%" or precio_unidad like "%' . $buscarTexto . '%" or created_at like "%' . $buscarTexto . '%"';

    $resultados = mysqli_query($con, $query);

    $html = '';
    if (mysqli_num_rows($resultados) > 0)
    {
        $html .= '<table class="default table table-bordered border border-dark border-2 mt-3" align="center">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th scope="col">Nombre producto</th>';
        $html .= '<th scope="col">Costo de compra</th>';
        $html .= '<th scope="col">Precio por unidad</th>';
        $html .= '<th scope="col">Precio por mayor</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        while ($row = mysqli_fetch_array($resultados))
        {
            $id = $row['id'];
            $producto = $row['producto'];
            $costo_compra = $row['costo_compra'];
            $precio_unidad = $row['precio_unidad'];
            $precio_por_mayor = $row['precio_por_mayor'];
            $existencias = $row['existencias'];
            $created_at = $row['created_at'];

            $html .= '<div id="'. $id . '">';
            $html .= '<tbody>';
            $html .= '<tr>';
            $html .= '<td>'. $producto .'</td>';
            $html .= '<td>'.'$'.number_format($costo_compra,0,',','.').'</td>';
            $html .= '<th>'.'$'.number_format($precio_unidad,0,',','.').'</th>';
            $html .= '<td>'.'$'.number_format($precio_por_mayor,0,',','.').'</td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</div>';
            
        }
        $html .= '</table>';
        
    }
    else
    {
        $html .= '<div>';
        $html .= '<h2>No se encontraron registros</h2>';
        $html .= '</div><br>';
    }
    echo $html;

    exit;

