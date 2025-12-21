<?php
//procesar_agregar.php
require_once "conexion.php";
session_start();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

$imagen = $_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/$imagen");

$conn->query("INSERT INTO productos (nombre,descripcion,precio,categoria,imagen) 
VALUES ('$nombre','$descripcion','$precio','$categoria','$imagen')");

$id = $conn->insert_id;


// si hay secundarias
if(!empty($_FILES['galeria']['name'][0])){
    foreach($_FILES['galeria']['name'] as $k=>$filename){
        move_uploaded_file($_FILES['galeria']['tmp_name'][$k],"../images/$filename");
        $conn->query("INSERT INTO fotos_producto (producto_id,archivo) VALUES ($id,'$filename')");
    }
}

header("Location: admin_panel.php");
exit;
