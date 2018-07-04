<?php
	if (isset($_POST['submit']))
	{
		include("DB.php");
		$password = $_POST["pass"];
		$username=$_POST["user"];
		$log = mysqli_query($link, "SELECT login, pass, id_contacto FROM Users WHERE login = '$username'") or die(mysqli_error($link));
		$direitos = mysqli_query($link, "SELECT direitos FROM Users where login='$username'") or die(mysqli_error($link));
		$registos=mysqli_fetch_array($log);
		$registos2=mysqli_fetch_array($direitos);
		try
		{
			if (strlen($username) >= 4 && strlen($username) <= 50) 
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\?\\\]/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\?\\\]/', $password)) 
				{   
					if (strlen($password) >= 8 && strlen($password) <= 60) 
					{
						if (mysqli_num_rows($log) > 0) 
						{	
							if (password_verify($password, $registos['pass']))
							{
								$direitos2 = utf8_encode($registos2["direitos"]);
								$empIdS = 'SELECT id_empresa FROM pessoas
										   WHERE id_contacto = '.$registos['id_contacto'];
								$empIdQ = mysqli_query($link, $empIdS) or die(mysqli_error($link));
								$empId = mysqli_fetch_array($empIdQ)[0];
								$idContS = "SELECT id FROM Contacto
											WHERE id = ".$registos['id_contacto'];
								$idContQ = mysqli_query($link, $idContS) or die(mysqli_error($link));
								$idCont = mysqli_fetch_array($idContQ)[0];
								$_SESSION['user'] = array('login' => $username, 'emp' => $empId, 'idCont' => $idCont);
								if ($direitos2 == "Admin") 
								{
									$_SESSION['sess_type'] = 1;
									
									header("location: homeAdmin");
								} else 
								{
									$_SESSION['sess_type'] = 2;
									
									header("location: home");
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