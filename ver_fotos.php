<?php
// verfotos.php
require_once "php/conexion.php";

$id = intval($_GET['id']);

// producto
$p = $conn->query("SELECT * FROM productos WHERE id=$id")->fetch_assoc();

// galería
$gal = $conn->query("SELECT * FROM fotos_producto WHERE producto_id=$id");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?= $p['nombre'] ?></title>
<style>
.galeria img{
    width:200px;
    margin:10px;
    border-radius:12px;
}
</style>
</head>
<body>

<h2><?= $p['nombre'] ?></h2>

<div class="galeria">

<?php if($gal->num_rows > 0): ?>
    <?php while($f = $gal->fetch_assoc()): ?>
        <img src="images/<?= $f['archivo'] ?>">
    <?php endwhile; ?>
<?php else: ?>
    <p>No hay más fotos para este producto.</p>
<?php endif; ?>

</div>

<br>
<a href="index.php">⬅ Volver</a>

</body>
</html>
