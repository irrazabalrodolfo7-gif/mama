<?php
//obtener_productos.php
require_once "conexion.php";

function obtenerProductos(){
    global $conn;
    $res = $conn->query("SELECT * FROM productos ORDER BY id DESC");
    $out = [];
    while($r = $res->fetch_assoc()){
        $out[] = $r;
    }
    return $out;
}

function obtenerProductoPorId($id){
    global $conn;
    return $conn->query(
        "SELECT * FROM productos WHERE id=$id"
    )->fetch_assoc();
}

