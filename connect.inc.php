<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>