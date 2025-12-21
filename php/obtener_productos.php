<?php
// obtener_producto.php
require_once "conexion.php";

// Devuelve todos los productos (para index)
function obtenerProductos(){
    global $conn;
    $sql = "SELECT * FROM productos ORDER BY id DESC";
    $res = $conn->query($sql);
    $productos = [];

    while($row = $res->fetch_assoc()){
        $productos[] = $row;
    }
    return $productos;
}

// Devuelve un producto por ID (para detalle.php)
function obtenerProductoPorId($id){
    global $conn;
    $sql = "SELECT * FROM productos WHERE id = $id";
    $res = $conn->query($sql);
    return $res->fetch_assoc();
}
?>
