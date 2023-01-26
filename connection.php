<?php

    require_once __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    /*$host = "localhost";
    $usuario = "root";
    $password = "";
    $dbnombre = "db_nelsy";*/

    echo getenv('MYSQLHOST');
    echo getenv('MYSQLUSER');
    echo getenv('MYSQLPASSWORD');
    echo getenv('MYSQLDATABASE');

    $host = getenv('MYSQLHOST');
    $usuario = getenv('MYSQLUSER');
    $password = getenv('MYSQLPASSWORD');
    $dbnombre = getenv('MYSQLDATABASE');

    $con = mysqli_connect($host, $usuario, $password, $dbnombre);

    if (!$con)
    {
        die("Error de Conexión: " . mysqli_connect_error());
    }

