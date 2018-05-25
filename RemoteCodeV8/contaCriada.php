<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
		{
			include("php/DB.php");
			$username = $_POST['login'];
			$pass = $_POST['pass1'];
			$pass1 = $_POST['pass2'];
			$idcont = $_POST['idcont'];
			$direitos = $_POST['direitos'];
			if ($pass!=$pass1)
			{
				echo ('Passwords nao sao iguais');
				exit;
			}
			$existe="SELECT * FROM Users Where login ='".$username."'";
			$se_existe=mysqli_query($link, $existe);
			if (mysqli_num_rows($se_existe)==0)
			{
				mysqli_query($link, "SET NAMES UTF8");
				$inserir="INSERT INTO Users( login, Pass, id_contacto, direitos) 
				VALUES ('".$username."',  '".$pass."',  '".$idcont."',  '".$direitos."')";
				mysqli_query($link, $inserir);
				header("location: contaCriada.php");				
			}
			else
			{
				echo ('User ja existe');
			}
	}
?>