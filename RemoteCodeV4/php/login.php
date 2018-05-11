<?php
	if (isset($_POST['submit']))
	{
		header('Content-Type: text/html; charset=UTF-8');
		include("DB.php");
		$password=$_POST["pass"];
		$username=$_POST["user"];
		$login = mysqli_query($link, "SELECT * FROM Users where login='$username' AND pass='$password'");
		$direitos = mysqli_query($link, "SELECT direitos FROM Users where login='$username' AND pass='$password'");


		if (strlen($username) >= 4 && strlen($username) <= 50) 
		{
			if (preg_match('/[a-zA-Z0-9_]+/', $username)) 
			{   
				if (strlen($password) >= 8 && strlen($password) <= 60) 
				{
					if (mysqli_num_rows($login) > 0) 
					{
						$registos=mysqli_fetch_array($login); //coloca o registo na variável
						session_start();
						$login = utf8_encode($registos["login"]);
						$registos2=mysqli_fetch_array($direitos); //coloca os direitos do user na variável
						$direitos2 = utf8_encode($registos2["direitos"]);
						
						$_SESSION["login"]=$login; //Cria a sessão com o conteúdo da coluna nome
						
						if ($direitos2 == "Admin") 
						{
							$_SESSION['sess_type'] = 1;
							header("location: homeAdmin.php");
						} else 
						{
							$_SESSION['sess_type'] = 2;
							header("location: home.php");
						}

					} else
					{
						echo 'Username ou Password não encontrados!';
					}
				} else
				{
					echo 'Palavra-Passe Inválida!';
				}
			} else
			{
				echo 'Nome de Utilizador Inválido!';
			}
		} else 
		{
			echo 'Nome de Utilizador Inválido!';    
		}
	}
?>