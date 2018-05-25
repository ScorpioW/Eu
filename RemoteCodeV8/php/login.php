<?php
	if (isset($_POST['submit']))
	{
		header('Content-Type: text/html; charset=UTF-8');
		include("DB.php");
		$password = $_POST["pass"];
		$username=$_POST["user"];
		$login = mysqli_query($link, "SELECT login, pass FROM Users WHERE login = '$username'");
		
		$direitos = mysqli_query($link, "SELECT direitos FROM Users where login='$username'");

		try
		{
			if (strlen($username) >= 4 && strlen($username) <= 50) 
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $password)) 
				{   
					if (strlen($password) >= 8 && strlen($password) <= 60) 
					{
						if (mysqli_num_rows($login) > 0) 
						{	
							$getPass = mysqli_fetch_array($login)['pass'];
							if (password_verify($password, $getPass))
							{
								$registos=mysqli_fetch_array($login); //coloca o registo na variável
								$login = utf8_encode($registos["login"]);
								$registos2=mysqli_fetch_array($direitos); //coloca os direitos do user na variável
								$direitos2 = utf8_encode($registos2["direitos"]);
								
								$sess = $_SESSION["login"] = $username; //Cria a sessão com o conteúdo da coluna nome
								
								
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
								echo '<p id="err">Username ou Password não encontrados!</p>';
							}
						} else
						{
							echo '<p id="err">Username ou Password não encontrados!</p>';
						}
					} else
					{
						echo '<p id="err">Palavra-Passe Inválida!</p>';
					}
				} else
				{
					echo '<p id="err">Nome de Utilizador ou Password Inválido!</p>';
				}
			} else 
			{
				echo '<p id="err">Nome de Utilizador Inválidos!</p>';    
			}
		} catch(Exception $e) 
		{
			echo 'Erro: ' .$e->getMessage();
		}
			
	}
?>