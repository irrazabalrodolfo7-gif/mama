<?php
// Conexión simple a MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "pamola";

$conn = new mysqli($host, $user, $pass, $db);

// Si falla, detiene todo
if($conn->connect_error){
    die("Error de conexión: " . $conn->connect_error);
}
?>
