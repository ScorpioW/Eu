<?php  
$id=$_GET['id'];
$nome=$_POST['login'];
$pass=$_POST['pass'];
$id_contacto=$_POST['id_contacto'];
$direitos=$_POST['direitos'];

include("DB.php");
$faz_actualizar=mysqli_query("Update Users SET login='".$login."',pass='".$pass."',id_contacto='".$id_contacto."',direitos='".$direitos."' WHERE id='".$id."'")or die();
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