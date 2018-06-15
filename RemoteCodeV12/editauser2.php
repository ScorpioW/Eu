<?php
if (isset($_SERVER['HTTP_REFERER'])) {
	$ref_url = $_SERVER['HTTP_REFERER'];
}else{
	$ref_url = 'No referrer set';
}
if (strpos($ref_url, 'editauser') != True) 
{
	header("location: paginareservada");
}

include("php/DB.php");
include("php/validarAdmin.php"); 
$id=$_GET['id'];
$faz_editar=mysqli_query($link,"SELECT id, login, direitos, id_contacto FROM Users WHERE id_contacto='$id'") or die(mysqli_error($link));
$registos=mysqli_fetch_array($faz_editar);?>

	<div id="page" class="container">
		<section>
			<h1>Editar Users</h1><br>
			<form action="atualiza?id=<?php echo $id;?>" method="POST" autocomplete="off">
			Username:<font size="2" color="red">&nbsp;*</font>
			<input type="text" name="login" value='<?php echo $registos['login'];?>'><br>
			<input type="radio" name="direitos" <?php echo ($registos['direitos'] =='Admin')? 'checked':'' ?> value="Admin"> Administrador &nbsp; &nbsp; 
			<input type="radio" name="direitos" <?php echo ($registos['direitos'] =='User')? 'checked':'' ?> value="User"> Utilizador <br><br>
			<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br>
			<br><input type="submit" value="Actualizar"> <input type="button" value="Voltar" onclick="window.location.href='editauser'">
		</section>	
	</div>
</div>
<?php include("php/footer.php"); ?>