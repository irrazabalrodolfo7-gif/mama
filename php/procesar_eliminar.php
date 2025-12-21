<?php
// procesar_eliminar.php
require 'conexion.php';
session_start();

// Verificar login
if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("Location: login.php");
    exit;
}

// Ver si llegó el ID
if (!isset($_GET['id'])) {
    die("Error: No se recibió el ID.");
}

$id = intval($_GET['id']);

// Obtener imagen para borrarla del servidor
$sql = "SELECT imagen FROM productos WHERE id = $id";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    $fila = $res->fetch_assoc();
    $ruta_imagen = "../images/" . $fila['imagen'];

    // Borrar archivo si existe
    if (file_exists($ruta_imagen)) {
        unlink($ruta_imagen);
    }
}

// Eliminar producto de la BD
$sql_delete = "DELETE FROM productos WHERE id = $id";
$conn->query($sql_delete);

header("Location: admin_panel.php?msg=eliminado");
exit;
?>
