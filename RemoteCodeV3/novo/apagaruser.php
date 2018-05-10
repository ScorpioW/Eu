<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#9bd3ec">
<form action="editauser.php">
	<input type="submit" value="Voltar">
</form>
</body>
</html>
<?php
	$id=$_GET['id'];
	include("../php/DB.php");
	// include("validar.php");
	$apagar = "DELETE from Users where id='$id'";
	$faz_apagar=mysqli_query($link, $apagar);
	echo "Apagado com sucesso!";
?>