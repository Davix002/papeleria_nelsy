<?php

    $host = "localhost";
    $usuario = "root";
    $password = "";
    $dbnombre = "db_nelsy";

    $con = mysqli_connect($host, $usuario, $password, $dbnombre);

    if (!$con)
    {
        die("Error de Conexión: " . mysqli_connect_error());
    }

