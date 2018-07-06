<?php  
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$em = $_POST['em'];
		$em2 = $_POST['em2'];
		 $tel = $_POST['tel'];
	     $tel2 = $_POST['tel2'];
		  $nome = $_POST['nome'];
		   $codP = $_POST['codP'];
		    $area = $_POST['area'];
		   $morada = $_POST['morada'];
		$localidade = $_POST['localidade'];
		try
		{
			if (strlen($nome) >= 1 && strlen($nome) <= 50) 
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $nome) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $nome)) 
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
							if (preg_match("/^[0-9]{3} [0-9]{3} [0-9]{3}$/", $tel)) 
							{
								$tel = str_replace(" ", "", $tel);
								if (preg_match("/^[0-9]{3} [0-9]{3} [0-9]{3}$/", $tel2) || $tel2 == "") 
								{
									if (preg_match("/^[0-9]{3} [0-9]{3} [0-9]{3}$/", $tel2))
									{
										$tel2 = str_replace(" ", "", $tel2);
									} else
									{
										$tel2 = "NULL";
									}
									if ((preg_match("/^[0-9]{4}$/", $codP) && preg_match("/^[0-9]{3}$/", $area)) || $codP == "" && $area == "") 
									{
										if (preg_match("/^[0-9]{4}$/", $codP) && preg_match("/^[0-9]{3}$/", $area))
										{
										} else
										{
											$codP = "NULL";
											$area = "NULL";
										}
										if ((preg_match('/[a-zA-Z0-9_]+/', $localidade) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $localidade)) || $localidade == "")
										{
											if ((preg_match('/[a-zA-Z0-9_]+/', $morada) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $morada))   || $morada == "")
											{											
												$existe = 'SELECT id FROM empresa
														WHERE nome = "'.$nome.'"';
												$seExiste = mysqli_query($link, $existe) or die(mysqli_error($link));

												if (mysqli_num_rows($seExiste) <= 0)
												{
													mysqli_query($link, "SET NAMES UTF8") or die(mysqli_error($link));

													$contSTR = 'INSERT INTO Contacto (isEmpresa, nome, morada, codP, area, Localidade)
																VALUES (1, "'.$nome.'", "'.$morada.'", '.$codP.', '.$area.', "'.$localidade.'")';
													mysqli_query($link, $contSTR) or die(mysqli_error($link));

													$idSTR = 'SELECT id FROM Contacto
																ORDER BY id DESC';
													$idQ = mysqli_query($link, $idSTR) or die(mysqli_error($link));
													$idCont = mysqli_fetch_array($idQ)[0];
													
													$pessSTR = 'INSERT INTO empresa (nome, id_contact)
																VALUES ("'.$nome.'", '.$idCont.')';
													mysqli_query($link, $pessSTR) or die(mysqli_error($link));

													$telStr = 'INSERT INTO Telefone (id_contacto, telefone, telefone2)
															VALUES ('.$idCont.', '.$tel.', '.$tel2.')';
													mysqli_query($link, $telStr) or die(mysqli_error($link));

													$emailSTR = 'INSERT INTO Email (id_contacto, email, email2)
																VALUES ('.$idCont.', '.$em.', '.$em2.')';
													mysqli_query($link, $emailSTR) or die(mysqli_error($link));
													header('location: contaCriada');
												} else
												{
													echo '';	
												}
												
											} else
											{
												echo '<p id="err">A morada que inseriu é inválida</p>';
											}

										} else 
										{
											echo '<p id="err">A localidade que inseriu é inválida</p>';
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
					echo '<p id="err">Nome da Empresa que Registou não é válido!</p>'; 
				}
			} else 
			{
				echo '<p id="err">Nome da Empresa que Registou não é válido!</p>';    
			}
		} catch(Exception $e) 
		{
			echo 'Erro: ' .$e->getMessage();
		}
	}
?>