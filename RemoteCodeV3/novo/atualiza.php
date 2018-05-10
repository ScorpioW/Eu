<?php  
$id=$_GET['id'];
$nome=$_POST['login'];
$pass=$_POST['pass'];
$id_contacto=$_POST['id_contacto'];
$direitos=$_POST['direitos'];
include("../php/DB.php");
$faz_actualizar=mysqli_query($link, "Update Users SET login='".$nome."',pass='".$pass."',id_contacto='".$id_contacto."',direitos='".$direitos."' WHERE id='".$id."'")or die();
($faz_actualizar) ? print 'Dados alterados com sucesso' : die('Falha ao alterar dados');
?>
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