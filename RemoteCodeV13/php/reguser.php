<?php 
	if (isset($_POST['submit']))
	{
		$em = $_POST['em'];
		$em2 = $_POST['em2'];
		 $tel = $_POST['tel'];
		 $tel2 = $_POST['tel2'];
		  $priv = $_POST['priv'];
		   $codP = $_POST['codP'];
		    $area = $_POST['area'];
		     $pass = $_POST["pass1"];
		     $pass1 = $_POST["pass2"];
		     $morada = $_POST['morada'];
		     $empresa = $_POST['emp'];
		     $username = $_POST['login'];
		    $localidade = $_POST['localidade'];
		if (isset($_POST['local'])){$local = $_POST['local'];}else{$local = "";}
		if (isset($_POST['ext'])){$ext = $_POST['ext'];}else{$ext = "";}
		try
		{
			if (strlen($username) >= 1 && strlen($username) <= 50) 
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $username) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $username) && !preg_match('/[\'\/~`\@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\,\\?\\\]/', $pass)) 
				{
					if (strlen($pass) >= 8 && strlen($pass) <= 60 && strlen($pass1) >= 8 && strlen($pass1) <= 60) 
					{
						if ($pass==$pass1)
						{
							$pass = password_hash($_POST["pass1"], PASSWORD_BCRYPT);
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
										if (preg_match("/^[0-9]{3} [0-9]{3} [0-9]{3}$/", $tel2) || $tel2 == "") 
										{
											$tel = str_replace(" ", "", $tel);
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
												{} else
												{
													$codP = "NULL";
													$area = "NULL";
												}
												if (preg_match("/^[0-9]{0,4}$/", $ext) || empty($ext))
												{
													if (empty($ext)) 
													{
														$ext = 0;
													}
													if (!preg_match('/[a-zA-Z0-9_]+/', $local) && preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $local))
													{
														echo('<p id="err">Local de trabalho inválido!</p>');
														throw(new Exception());
													} 
													if (!$local == "") {
														$local = "'" . mysqli_escape_string($link, $local) . "'";
													} else {
														$local = "NULL";
													}
													$existe="SELECT * FROM Users Where login ='".$username."'";
													$se_existe=mysqli_query($link, $existe) or die(mysqli_error($link));
													if (mysqli_num_rows($se_existe) == 0)
													{
														$existe = 'SELECT id FROM empresa
																WHERE nome = "'.$empresa.'"';
														$seExiste = mysqli_query($link, $existe) or die(mysqli_error($link));

														if (mysqli_num_rows($seExiste) > 0 || $empresa == "Nenhuma")
														{
															if (strlen($empresa) > 0 && $empresa != "Nenhuma") {
																$empresaArr = mysqli_fetch_array($seExiste)[0];
																$emp = $empresaArr;

																$extValSTR = "SELECT extensao, id_contacto FROM Interno
																		  WHERE id_empresa = $emp";
																$extValQ = mysqli_query($link, $extValSTR) or die(mysqli_error($link));

																if (mysqli_num_rows($extValQ))
																{
																	while ($extValA = mysqli_fetch_array($extValQ)) 
																	{
																		if ($ext == $extValA[0]) 
																		{
																			echo '<p id="err">Essa extensão já está associada internamente!</p>';
																			throw(new Exception());
																		}
																	}
																}
															} else {
																$ext = "NULL";
																$local = "NULL";
																$emp = "NULL";
															}
															$contSTR = 'INSERT INTO Contacto (isEmpresa, nome, morada, codP, area, Localidade)
																		VALUES (0, "'.$username.'", "'.$morada.'", '.$codP.', '.$area.', "'.$localidade.'")';
															mysqli_query($link, $contSTR) or die(mysqli_error($link));
															$idSTR = 'SELECT id FROM Contacto
																		ORDER BY id DESC';
															$idQ = mysqli_query($link, $idSTR) or die(mysqli_error($link));
															$idCont = mysqli_fetch_array($idQ)[0];
															$pessSTR = 'INSERT INTO pessoas (nome, id_empresa, id_contacto)
																		VALUES ("'.$username.'", '.$emp.', '.$idCont.')';
															mysqli_query($link, $pessSTR) or die(mysqli_error($link));
															$telStr = 'INSERT INTO Telefone (id_contacto, telefone, telefone2)
																	VALUES ('.$idCont.', '.$tel.', '.$tel2.')';
															mysqli_query($link, $telStr) or die(mysqli_error($link));
															$emailSTR = 'INSERT INTO Email (id_contacto, email, email2)
																		VALUES ('.$idCont.', '.$em.', '.$em2.')';
															mysqli_query($link, $emailSTR) or die(mysqli_error($link));
															$inserir="INSERT INTO Users(login, Pass, id_contacto, direitos) 
															VALUES ('".$username."',  '".$pass."',  '".$idCont."',  '".$priv."')";
															mysqli_query($link, $inserir) or die(mysqli_error($link));
															$inserir = "INSERT INTO Interno (id_contacto, id_empresa, extensao, local) 
																		VALUES (".$idCont.",".$emp.", ".$ext.", ".$local.")";
															mysqli_query($link, $inserir) or die(mysqli_error($link));
															?>
															<script type="text/javascript">
															window.location.href = 'contaCriada';
															</script>
															<?php
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
													echo '<p id="err">Extensão Inválida!</p>';
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
			echo $e->getMessage();
		}
	}
?>