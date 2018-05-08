<?php  
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['submit']))
	{
		include("BD.php");


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
		$existe="SELECT * FROM Users Where login ='".$login."'";
		$se_existe=mysqli_query($existe, $link);
		if (mysqli_num_rows($se_existe)==0)
		{
			mysqli_query("SET NAMES UTF8");
			$inserir="INSERT INTO Users( login, Pass, id_contacto, direitos) 
			VALUES ('".$login."',  '".$pass."',  '".$idcont."',  '".$direitos."')";
			$a=mysqli_query($inserir,$link);
			$_SESSION["Username"]=$login; //Cria a sessão com o conteúdo da coluna nome
			echo ('Utilizador criado');
			
		}
		else
		{
			echo ('User ja existe');
		}
}



?>