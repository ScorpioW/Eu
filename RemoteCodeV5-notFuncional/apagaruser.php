<?php include("php/validarAdmin.php");?>
<form action="editauser.php">
	<input type="submit" value="Voltar">
</form>
</body>
</html>
<?php
	$id=$_GET['id'];
	include("php/DB.php");
	// include("validar.php");
	$apagar = "DELETE from Users where id='$id'";
	$faz_apagar=mysqli_query($link, $apagar);
	echo "Apagado com sucesso!";
?>