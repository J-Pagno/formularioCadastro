<?php

// Conexão
$host = "localhost";
$user = "root";
$password = "";
$banco    = "cadastro";

$connect = mysqli_connect("$host", "$user", "$password", "$banco");

// /* Checa a connection */
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
