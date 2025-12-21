<?php
// prooducstos.php
require_once "conexion.php";
include "header.php";

$sql = "SELECT * FROM productos ORDER BY id DESC";
$res = $conn->query($sql);
?>

<h1 class="titulo">Nuestros Productos</h1>

<style>
/* ... tu CSS acá igual ... */
</style>

<div class="grid">

<?php if ($res && $res->num_rows > 0): ?>
    <?php while ($p = $res->fetch_assoc()): ?>
        <div class="card">
            <a href="detalle.php?id=<?= $p['id'] ?>">
                <img src="images/<?= htmlspecialchars($p['imagen']) ?>">
            </a>
            <h3><?= htmlspecialchars($p['nombre']) ?></h3>
            <p class="precio">$<?= htmlspecialchars($p['precio']) ?></p>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No hay productos cargados.</p>
<?php endif; ?>

</div>

<?php include "footer.php";?>
