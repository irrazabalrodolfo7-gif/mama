<?php
require_once "conexion.php";
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);

$prod = $conn->query("SELECT * FROM productos WHERE id=$id")->fetch_assoc();
$gal  = $conn->query("SELECT * FROM fotos_producto WHERE producto_id=$id");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar producto</title>
</head>
<body>

<h2>Editar producto</h2>

<form action="procesar_editar.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $id ?>">

Nombre:<br>
<input type="text" name="nombre" value="<?= $prod['nombre'] ?>"><br><br>

Descripción:<br>
<textarea name="descripcion"><?= $prod['descripcion'] ?></textarea><br><br>

Precio:<br>
<input type="number" name="precio" value="<?= $prod['precio'] ?>"><br><br>

Categoría:<br>
<input type="text" name="categoria" value="<?= $prod['categoria'] ?>"><br><br>

Imagen principal:<br>
<img src="../images/<?= $prod['imagen'] ?>" width="120"><br>
<input type="file" name="imagen"><br><br>

<h3>Imágenes secundarias</h3>

<?php while($f = $gal->fetch_assoc()): ?>
    <img src="../images/<?= $f['archivo'] ?>" width="100"><br>
<?php endwhile; ?>

<br>
Agregar más imágenes:<br>
<input type="file" name="galeria[]" multiple><br><br>

<button>Guardar</button>
</form>

<br>
<a href="admin_panel.php">Volver</a>

</body>
</html>
