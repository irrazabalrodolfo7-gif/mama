<?php 
require_once "header.php"; 
?>

<h2 style="text-align:center; margin-top:20px;">Iniciar sesión</h2>

<form action="verificar_login.php" method="POST" style="text-align:center; margin-top:20px;">
    <input type="text" name="user" placeholder="Usuario"><br><br>
    <input type="password" name="pass" placeholder="Contraseña"><br><br>
    <button>Ingresar</button>
</form>
<div class="row">.</div>
<div style="text-align:center;">
    <a class="btn-volver" href="../index.php">Volver</a>
</div>

<?php 
require_once "footer.php"; 
?>
