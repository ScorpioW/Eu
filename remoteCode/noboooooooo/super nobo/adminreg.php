<?php  
header('Content-Type: text/html; charset=UTF-8');

include("DB.php");
include("validar.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>
<body bgcolor="#9bd3ec">
	<h2>Dados do Utilizador</h2><br>
	<form action="" method="post">
        
        Login: <input type="text" name="login"><br>
        Password:<input type="text" name="pass1"><br>
        Password 2 :<input type="text" name="pass2"><br>
        Id do seu contacto :<input type="text" name="idcont"><br>
        Direitos :<input type="text" name="direitos"><br>
        <input type="submit" value="Registar">
        <input type="reset" value="Limpar">
        <?php include("reguser.php"); ?>
    </form>
</body>
</html>