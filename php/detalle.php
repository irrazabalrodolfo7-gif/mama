<?php
//detalle.php
require_once "php/conexion.php";

$id = intval($_GET['id']);

$p = $conn->query("SELECT * FROM productos WHERE id=$id")->fetch_assoc();
$gal = $conn->query("SELECT * FROM fotos_producto WHERE producto_id=$id");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title><?= $p['nombre'] ?></title>

<style>
.detalle{
    max-width:900px;
    margin:auto;
    padding:20px;
}
.principal{
    width:350px;
    border-radius:15px;
}
.galeria img{
    width:120px;
    margin:6px;
    border-radius:10px;
}
</style>
</head>
<body>

<div class="detalle">

<h2><?= $p['nombre'] ?></h2>

<img class="principal" src="images/<?= $p['imagen'] ?>">

<div class="galeria">
<?php while($f = $gal->fetch_assoc()): ?>
    <img src="images/<?= $f['archivo'] ?>">
<?php endwhile; ?>
</div>

<p><?= $p['descripcion'] ?></p>
<p><b>Precio:</b> $<?= $p['precio'] ?></p>

<a href="index.php">⬅ Volver</a>

</div>

</body>
</html>
