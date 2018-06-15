<?php  
	include("php/validarAdmin.php"); 
	include("php/DB.php");

	if (isset($_SERVER['HTTP_REFERER'])) {
			$ref_url = $_SERVER['HTTP_REFERER'];
		}else{
			$ref_url = 'No referrer set';
		}
		if (strpos($ref_url, 'editacont2') != True) 
		{
			header("location: paginareservada");
		}

	$id=$_GET['id'];

	$lista = "SELECT isEmpresa FROM Contacto
	WHERE id = $id";
	$getIsEmpQ = mysqli_query($link, $lista) or die(mysqli_error($link));
	$isEmp = mysqli_fetch_array($getIsEmpQ)[0];

	$nome=$_POST['nome'];
	$morada=$_POST['morada'];
	$codP=$_POST['codP'];
	$area=$_POST['area'];
	$localidade=$_POST['localidade'];
	$tel=$_POST['telefone'];
	$tel2=$_POST['telefone2'];
	$em=$_POST['email'];
	$em2=$_POST['email2'];
?>

	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Atualiza Contactos</h2>
			</header>
<?php
	try
	{
		if (strlen($nome) >= 1 && strlen($nome) <= 50) 
		{
			if (preg_match('/[a-zA-Z0-9_]+/', $nome) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>\\?\\\]/', $nome)) 
			{
				$nome = "'" . mysqli_escape_string($link, $nome) . "'";
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
							$tel = str_replace(' ', '', $tel);
							if (preg_match("/^[0-9]{3} [0-9]{3} [0-9]{3}$/", $tel2) || $tel2 == "") 
							{
								if (preg_match("/^[0-9]{3} [0-9]{3} [0-9]{3}$/", $tel2))
								{
									$tel2 = str_replace(' ', '', $tel2);
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
									if ((preg_match('/[a-zA-Z0-9_]+/', $localidade) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\,\\?\\\]/', $localidade)) || $localidade == "")
									{
										if ((preg_match('/[a-zA-Z0-9_]+/', $morada) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>\\?\\\]/', $morada)) || $morada == "")  
										{ 
											if ($isEmp == 0) 
											{
												$emp = $_POST["emp"];
												if (isset($_POST['ext'])){$ext = $_POST["ext"];}else{$ext = "";}
												if (isset($_POST['local'])){$local = $_POST["local"];}else{$local = "";}

												if (!preg_match('/[a-zA-Z0-9_]+/', $local) && preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>\\?\\\]/', $local))
												{
													echo('<p id="err">Local de trabalho inválido!</p>');
													throw(new Exception());
												} 

												if (!$local == "") {
													$local = "'" . mysqli_escape_string($link, $local) . "'";
												} else {
													$local = "NULL";
												}

												if (!preg_match("/^[0-9]{0,4}$/", $ext)) 
												{
													echo('<p id="err">Extensão inválida!</p>');
													throw(new Exception());
												} elseif (empty($ext))
												{
													$ext = "NULL";
												}
												if (preg_match('/[a-zA-Z0-9_]+/', $emp) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>\\?\\\]/', $emp) || $emp == "Nenhuma")
												{
													if ($emp != "Nenhuma") {
														$idEmpSTR = "SELECT id FROM empresa
																     WHERE nome = '$emp'";
														$idEmpQ = mysqli_query($link, $idEmpSTR) or die(mysqli_error($link));
														$idEmp = mysqli_fetch_array($idEmpQ)[0];
														$extValSTR = "SELECT extensao, id_contacto FROM Interno
																	  WHERE id_empresa = $idEmp
																	  AND id_contacto <> $id";
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
														$idEmp = "NULL";
														$local = "NULL";
													}
													$faz_actualizar=mysqli_query($link, "Update pessoas SET nome=".$nome.", id_empresa=$idEmp WHERE id_contacto = $id") or die(mysqli_error($link));
													$faz_atualizar=mysqli_query($link, "Update Interno SET extensao = $ext, local=$local, id_empresa=$idEmp WHERE id_contacto = $id") or die(mysqli_error($link));

												} else
												{
													echo '<p id="err">A empresa que inseriu não é válida</p>';
												}
											} else
											{
												$empresaSTR = "UPDATE empresa SET nome = ".$nome." WHERE id_contact = ".$id."" or die(mysqli_error($link));
												$empresaQ = mysqli_query($link, $empresaSTR) or die(mysqli_error($link));
											}
											
											
											$getUserSTR = "SELECT login FROM Users
														WHERE id_contacto = $id";
											$getUserQ = mysqli_query($link, $getUserSTR) or die(mysqli_error($link));
											$getUser = mysqli_fetch_array($getUserQ)[0];

											if (strlen($getUser) > 0) 
											{
												$faz_actualizar=mysqli_query($link, "Update Users SET login=".$nome." WHERE id_contacto = $id") or die(mysqli_error($link));
											} 

											$faz_actualizar=mysqli_query($link, "Update Contacto SET nome=".$nome.",morada='".$morada."',codP='".$codP."',area='".$area."',localidade='".$localidade."' WHERE id='".$id."'") or die(mysqli_error($link));
											$faz_actualizar=mysqli_query($link, "Update Telefone SET telefone=".$tel.", telefone2=".$tel2." WHERE id_contacto='".$id."'") or die(mysqli_error($link));
											$faz_actualizar=mysqli_query($link, "Update Email SET email=".$em.", email2=".$em2." WHERE id_contacto='".$id."'") or die(mysqli_error($link));
											echo'<p id="sucess">Dados alterados com sucesso!</p>';
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
									echo '<p id="err">Código Postal Inválido</p>';
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
			echo '<p id="err">Nome que Registou não é válido!</p>';    
		}
	} catch(Exception $e) 
	{}
?>
				<form action="editacont">
					<input type="submit" value="Voltar">
				</form>
		</section>
	</div>
<!-- /Page -->

</div>
<?php include("php/footer.php"); ?>

<!-- $faz_actualizar=mysqli_query($link, "Update Contacto SET isEmpresa='".$isEmpresa."',nome='".$nome."',morada='".$morada."',codP='".$codP."',area='".$Area."',localidade='".$localidade."' WHERE id='".$id."'")or die();
 -->