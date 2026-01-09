<?php
// admin_panel.php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "conexion.php";

// productos
$res = $conn->query("SELECT * FROM productos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Panel Admin</title>
</head>
<body>

<h2>Panel de administración</h2>
<a href="logout.php">Cerrar sesión</a>
<hr>

<h3>Agregar producto</h3>

<!-- FORM ORIGINAL, solo se AGREGA galeria[] -->
<form action="procesar_agregar.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="descripcion" placeholder="Descripción" required>
    <input type="number" name="precio" placeholder="Precio" required>
    <input type="text" name="categoria" placeholder="Categoría" required>

    <br><br>

    Imagen principal:
    <input type="file" name="imagen" required>

    <br><br>

    <!-- ESTO ES LO QUE NO TE APARECÍA -->
    Imágenes secundarias:
    <input type="file" name="galeria[]" multiple>

    <br><br>
    <button>Agregar</button>
</form>

<hr>

<h3>Productos cargados</h3>

<table border="1" cellpadding="6">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Imagen</th>
    <th>Acciones</th>
</tr>

<?php while($p = $res->fetch_assoc()): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['nombre'] ?></td>
    <td><?= $p['precio'] ?></td>
    <td>
        <?php if($p['imagen']): ?>
            <img src="../images/<?= $p['imagen'] ?>" width="60">
        <?php endif; ?>
    </td>
    <td>
        <a href="admin_editar.php?id=<?= $p['id'] ?>">Editar</a> |
        <a href="admin_eliminar.php?id=<?= $p['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
