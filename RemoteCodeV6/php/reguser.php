<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$username = $_POST['login'];
		$pass = $_POST['pass1'];
		$pass1 = $_POST['pass2'];
		$empresa = $_POST['empresa'];
		$em = $_POST['em'];
		$em2 = $_POST['em2'];
		$tel = $_POST['tel'];
		$tel2 = $_POST['tel2'];
		$priv = $_POST['priv'];
		$codP = $_POST['codP'];
		$area = $_POST['area'];
		$localidade = $_POST['localidade'];
		$morada = $_POST['morada'];

		try
		{
			if (strlen($username) >= 4 && strlen($username) <= 50) 
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $pass)) 
				{   

					if (strlen($pass) >= 8 && strlen($pass) <= 60 && strlen($pass1) >= 8 && strlen($pass1) <= 60) 
					{
						if ($pass==$pass1)
						{
							if (filter_var($em, FILTER_VALIDATE_EMAIL) || $em == "")
							{
								if (!$em == "") {
									$em = "'" . mysqli_escape_string($link, $em) . "'";
								} else {
									$em = "NULL";
								}
								if (filter_var($em2, FILTER_VALIDATE_EMAIL) || $em2 == "") 
								{				
									if (!$em2 == "") {
										$em2 = "'" . mysqli_escape_string($link, $em2) . "'";
									} else {
										$em2 = "NULL";
									}			
									if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $tel)) 
									{
										$tel = str_replace("-", "", $tel);
										if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $tel2) || $tel2 == "") 
										{
											if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $tel2))
											{
												$tel2 = str_replace("-", "", $tel2);
											} else
											{
												$tel2 = "NULL";
											}
											if (preg_match("/^[0-9]{4}$/", $codP) && preg_match("/^[0-9]{3}$/", $area)) 
											{
												$existe="SELECT * FROM Users Where login ='".$username."'";
												$se_existe=mysqli_query($link, $existe);
												if (mysqli_num_rows($se_existe) == 0)
												{
													$existe = 'SELECT id FROM empresa
															 WHERE nome = "'.$empresa.'"';
													$seExiste = mysqli_query($link, $existe);

													if (mysqli_num_rows($seExiste) > 0 || $empresa == "")
													{
														if ($empresa == "") 
														{
															$empresa = "NULL";
														}
														mysqli_set_charset($link, "UTF8");
														mysqli_query($link, "SET NAMES UTF8");

														$idEmp = mysqli_fetch_array($seExiste)[0];

														$contSTR = 'INSERT INTO Contacto (isEmpresa, nome, morada, codP, area, Localidade)
																	VALUES (0, "'.$username.'", "'.$morada.'", '.$codP.', '.$area.', "'.$localidade.'")';
														mysqli_query($link, $contSTR);

														$idSTR = 'SELECT id FROM Contacto
																	ORDER BY id DESC';
														$idQ = mysqli_query($link, $idSTR);
														$idCont = mysqli_fetch_array($idQ)[0];
														
														$pessSTR = 'INSERT INTO pessoas (nome, id_empresa, id_contacto)
																	VALUES ("'.$username.'", '.$idEmp.', '.$idCont.')';
														mysqli_query($link, $pessSTR);

														$telStr = 'INSERT INTO Telefone (id_contacto, telefone, telefone2)
																VALUES ('.$idCont.', '.$tel.', '.$tel2.')';
														mysqli_query($link, $telStr);

														$emailSTR = 'INSERT INTO Email (id_contacto, email, email2)
																	VALUES ('.$idCont.', '.$em.', '.$em2.')';
														mysqli_query($link, $emailSTR);

														
														$inserir="INSERT INTO Users(login, Pass, id_contacto, direitos) 
														VALUES ('".$username."',  '".$pass."',  '".$idCont."',  '".$priv."')";
														mysqli_query($link, $inserir);
														
													} else
													{	
														echo '<p id="err">A Empresa não se encontra registada';
													}
												} else
												{
													echo '<p id="err">Nome de Utilizador já existe!</p>';
												}
											} else
											{
												echo '<p id="err">Código Postal Errado</p>';
											}
										} else
										{
											echo '<p id="err">Número de Telefone Secundário Inválido!</p>';
										}
									} else
									{
										echo '<p id="err">Número de Telefone Primário Inválido!</p>';
									}
								} else
								{
									echo '<p id="err">Email Secundário Inválido';
								}
							} else
							{
								echo '<p id="err">Email Primário Inválido';
							}
						} else
						{
							echo '<p id="err">As Passwords têm de Coincidir!</p>';
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
				echo '<p id="err">Nome de Utilizador Inválido!</p>';    
			}
		} catch(Exception $e) 
		{
			echo 'Erro: ' .$e->getMessage();
		}
	}
?>

													