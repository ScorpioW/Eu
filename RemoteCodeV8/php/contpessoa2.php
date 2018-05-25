<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $empresa = $_POST['empresa'];
		$codP = $_POST['codP'];
		$area = $_POST['area'];
		$localidade = $_POST['localidade'];
		$em = $_POST['em'];
		$em2 = $_POST['em2'];
		$tel = $_POST['tel'];
		$tel2 = $_POST['tel2'];
		
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
										if (preg_match('/[a-zA-Z0-9_]+/', $localidade) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $localidade)) 
										{
											if (preg_match('/[a-zA-Z0-9_]+/', $morada) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $morada))  
											{ 
												if (preg_match('/[a-zA-Z0-9_]+/', $empresa) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $empresa) || strlen($empresa) <= 0)
											    {
													mysqli_query($link, "SET NAMES UTF8");
													$confEmpresaS = "SELECT id FROM empresa WHERE nome = '".$empresa."'";
													$confEmpresaQ = mysqli_query($link, $confEmpresaS);
													$resEmpresas = mysqli_num_rows($confEmpresaQ);
													while ($empresaArr = mysqli_fetch_array($confEmpresaQ))
													{
														$emp = $empresaArr[0];
													}
													
													if (empty($empresa)) 
													{
														$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
															VALUES (0,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
															mysqli_query($link, $inserir) or die("Inserir 1");
															$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
															$selectQ = mysqli_query($link, $q) or die("Select");
															while ($select = mysqli_fetch_array($selectQ))
															{
																	$s = $select['0'];
															}
														$empresa = "NULL";
														$inserir2 = "INSERT INTO pessoas(nome, id_empresa, id_contacto) VALUES ('".$nome."', ".$empresa.",".$s.")";
													}
													elseif ($resEmpresas == 0)
													{
														die("<p id='err'>Não existe nenhuma empresa com esse nome.</p>");
													}
													else{
															$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
															VALUES (0,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
															mysqli_query($link, $inserir) or die("Inserir 1");
															$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
															$selectQ = mysqli_query($link, $q) or die("Select");
															while ($select = mysqli_fetch_array($selectQ))
															{
																	$s = $select[0];
															}
															$inserir2 = "INSERT INTO pessoas(nome, id_empresa, id_contacto) VALUES ('".$nome."', '".$emp."',".$s.")";
														}
														mysqli_query($link, $inserir2) or die("Inserir 2");
														$inserir3="INSERT INTO Email(id_contacto, email, email2) VALUES (".$s.", ".$em.", ".$em2.")";
														mysqli_query($link,$inserir3) or die("Inserir 3");
														$inserir4="INSERT INTO Telefone(id_contacto, telefone, telefone2) VALUES (".$s.", ".$tel.", ".$tel2.")";
														mysqli_query($link,$inserir4) or die("Inserir 4");
												} else
												{
													echo '<p id="err">A empresa que inseriu não é válida</p>';
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