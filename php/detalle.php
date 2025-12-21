<?php
// detalle.php
require_once "conexion.php";
include "header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id = $id LIMIT 1";
$res = $conn->query($sql);
$p = $res->fetch_assoc();
?>

<style>
    .contenedor-detalle {
        max-width: 900px;
        margin: auto;
        display: flex;
        gap: 25px;
        padding: 20px;
        flex-wrap: wrap;
    }

    .contenedor-detalle img {
        width: 350px;
        border-radius: 15px;
    }

    .info {
        flex: 1;
    }

    .precio {
        font-size: 23px;
        color: #b000b5;
        font-weight: bold;
    }
</style>

<div class="contenedor-detalle">

<img src="../images/<?= $p['imagen'] ?>">


    <div class="info">
        <h2><?= $p['nombre'] ?></h2>
        <p><?= $p['descripcion'] ?></p>
        <p class="precio">$<?= $p['precio'] ?></p>

        <br><br>
        <a href="productos.php">⬅ Volver a productos</a>
    </div>

</div>

<?php include "footer.php"; ?>
