<?php
if (isset($_SERVER['HTTP_REFERER'])) {
$ref_url = $_SERVER['HTTP_REFERER'];
}else{
$ref_url = 'No referrer set';
}
if (strpos($ref_url, 'editauser.php') != True) 
{
	header("location: paginareservada.php");
}

include("php/DB.php");
include("php/header.php"); 
$id=$_GET['id'];
$faz_editar=mysqli_query($link,"Select id, login, direitos, id_contacto from Users where id_contacto='$id'");
$registos=mysqli_fetch_array($faz_editar);?>

<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Users</h2>
			</header>
			<form action="php/atualiza.php?id=<?php echo $id;?>" method="POST" autocomplete="off">
			Username:<font size="2" color="red">&nbsp;*</font>
			<input type="text" name="login" value='<?php echo $registos['login'];?>'><br>
			<input type="radio" name="direitos" <?php echo ($registos['direitos'] =='Admin')? 'checked':'' ?> value="Admin"> Administrador &nbsp; &nbsp; 
			<input type="radio" name="direitos" <?php echo ($registos['direitos'] =='User')? 'checked':'' ?> value="User"> Utilizador <br><br>
			<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br>
			<br><input type="submit" value="Actualizar"> <input type="button" value="Voltar" onclick="window.location.href='editauser.php'">
		</section>		
	</div>
<!-- /Page -->
</div>
	<?php include("php/footer.php"); ?>