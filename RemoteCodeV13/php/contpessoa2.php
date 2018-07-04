<?php 
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$em = $_POST['em'];
		$em2 = $_POST['em2'];
		 $tel = $_POST['tel'];
		 $tel2 = $_POST['tel2'];
		  $codP = $_POST['codP'];
		   $nome = $_POST['nome'];
		    $area = $_POST['area'];
           $morada = $_POST['morada'];
           $empresa = $_POST['emp'];
		 $localidade = $_POST['localidade'];
		if (isset($_POST['ext'])){$ext = $_POST['ext'];}else{$ext = "";}
		if (isset($_POST['local'])){$local = $_POST['local'];}else{$local = "";};

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
										{} else
										   {
										       $codP = "NULL";
											   $area = "NULL";
										   }
										if ((preg_match('/[a-zA-Z0-9_]+/', $localidade) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $localidade))  || $localidade == "")
										{
											if ((preg_match('/[a-zA-Z0-9_]+/', $morada) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $morada))  || $morada == "") 
											{ 
												if (preg_match('/[a-zA-Z0-9_]+/', $empresa) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $empresa) || strlen($empresa) <= 0)
											    {
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

														
														$confEmpresaS = "SELECT id FROM empresa WHERE nome = '".$empresa."'";
														$confEmpresaQ = mysqli_query($link, $confEmpresaS) or die(mysqli_error($link));
														$resEmpresas = mysqli_num_rows($confEmpresaQ);
														while ($empresaArr = mysqli_fetch_array($confEmpresaQ))
														{
															$emp = $empresaArr[0];
														}
														
														if ($empresa == "Nenhuma") 
														{
															$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
																VALUES (0,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
																mysqli_query($link, $inserir) or die(mysqli_error($link));
															$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
															$selectQ = mysqli_query($link, $q) or die(mysqli_error($link));
															while ($select = mysqli_fetch_array($selectQ))
															{
																$s = $select['0'];
															}
															$ext = "NULL";
															$local = "NULL";
															$emp = "NULL";
															$inserir2 = "INSERT INTO pessoas(nome, id_empresa, id_contacto) VALUES ('".$nome."', ".$emp.",".$s.")";
														}
														elseif ($resEmpresas == 0)
														{
															echo ("<p id='err'>Não existe nenhuma empresa com esse nome.</p>");
															throw(new Exception());
														}
														else
														{
															$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
															VALUES (0,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
															mysqli_query($link, $inserir) or die(mysqli_error($link));
															$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
															$selectQ = mysqli_query($link, $q) or die(mysqli_error($link));
															while ($select = mysqli_fetch_array($selectQ))
															{
																	$s = $select[0];
															}

															if (empty($ext))
															{
																$ext = "NULL";
															}

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

															$inserir2 = "INSERT INTO pessoas(nome, id_empresa, id_contacto) VALUES ('".$nome."', '".$emp."',".$s.")";
														}
														mysqli_query($link, $inserir2) or die(mysqli_error($link));
														$inserir3="INSERT INTO Email(id_contacto, email, email2) VALUES (".$s.", ".$em.", ".$em2.")";
														mysqli_query($link,$inserir3) or die(mysqli_error($link));
														$inserir4="INSERT INTO Telefone(id_contacto, telefone, telefone2) VALUES (".$s.", ".$tel.", ".$tel2.")";
														mysqli_query($link,$inserir4) or die(mysqli_error($link));
														$inserir5="INSERT INTO Interno(id_contacto, id_empresa, extensao, local) values (".$s.", ".$emp.", ".$ext.", ".$local.")";
														mysqli_query($link, $inserir5) or die(mysqli_error($link));
														header('location: contaCriada');
													}else
													{
														echo '<p id="err">Extensão inválida!</p>';
													}
												} else
												{
													echo '<p id="err">A empresa que inseriu não é válida!</p>';
												}									
												
											} else
											{
												echo '<p id="err">A morada que inseriu é inválida!</p>';
											}
										} else 
										{
											echo '<p id="err">A localidade que inseriu é inválida!</p>';
										}
									} else
									{
										echo '<p id="err">Código postal inválido!/p>';
									}
								} else
								{
									echo '<p id="err">Número de telefone secundário inválido!</p>';
								}
							} else
							{
								echo '<p id="err">Número de telefone primário inválido!</p>';
							}
						} else
						{
							echo '<p id="err">Email secundário inválido';
						}
					} else
					{
						echo '<p id="err">Email primário inválido';
					}
				} else
				{
					echo '<p id="err">Nome da empresa que registou não é válido!</p>'; 
				}
			} else 
			{
				echo '<p id="err">Nome que registou não é válido!</p>';    
			}
		} catch(Exception $e) 
		{}
	}
?>