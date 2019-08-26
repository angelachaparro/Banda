<?php
// Inicio sesiones
session_start();

if(isset($_SESSION["logged"])){
	header("Location: index.php");
}
?>
  <?php
	if(isset($_SESSION["error_login"])){ ?>
		<div class="alert alert-danger"><?=$_SESSION["error_login"]?></div>
	<?php }?>
  <?php require_once 'includes/header.php'; ?>
  <h2>Identificate</h2>
  <div class="col-lg-5" style="padding-left:0px;">
    <?php if(isset($_SESSION["error_login"])){?>
      <div class="alert alert-danger"><?=$_SESSION["error_login"]?></div>
    <?php } ?>
	<form action="login-user.php" method="POST">
		Usuario: <input name="nombre" type="text" class="form-control" />
		Contraseña: <input name="documento" type="password"  class="form-control" />
		<br/>
		<input type="submit" class="btn btn-success" name="submit" value="Entrar"/>
	</form>
</div>
<div class="clearfix"></div>
<?php require_once 'includes/footer.php'; ?>
