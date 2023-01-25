<?php

    require_once __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    /*$host = "localhost";
    $usuario = "root";
    $password = "";
    $dbnombre = "db_nelsy";*/

    $host = $_ENV['MYSQLHOST'];
    $usuario = $_ENV['MYSQLUSER'];
    $password = $_ENV['MYSQLPASSWORD'];
    $dbnombre = $_ENV['MYSQLDATABASE'];

    $con = mysqli_connect($host, $usuario, $password, $dbnombre);

    if (!$con)
    {
        die("Error de Conexión: " . mysqli_connect_error());
    }

