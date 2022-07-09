<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "projeto4";
$port = 3306;

try {
    $conn = new PDO("mysql:host = $host; porta=$port; dbname=".$dbname,$user,$pass);
    //echo"conectado";
} catch (Exception $erro) {
    echo"<p style= 'color:red'> Não foi possível conectar. Erro gerado: </p><br>".$erro->getMessage();
}


