<?php  
 include("php/validarAdmin.php"); 
 include("php/DB.php");
$id=$_GET['id'];

$lista = "SELECT isEmpresa FROM Contacto
WHERE id = $id";
$getIsEmpQ = mysqli_query($link, $lista);
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
					if (preg_match("/^[0-9]{9}$/", $tel)) 
					{
						if (preg_match("/^[0-9]{9}$/", $tel2) || $tel2 == "") 
						{
							if (preg_match("/^[0-9]{9}$/", $tel2))
							{
							} else
							{
								$tel2 = "NULL";
							}
							if ((preg_match("/^[0-9]{4}$/", $codP) && preg_match("/^[0-9]{3}$/", $area)) || $codP == "" && $area == "") 
							{
								if ((preg_match('/[a-zA-Z0-9_]+/', $localidade) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $localidade)) || $localidade == "")
								{
									if ((preg_match('/[a-zA-Z0-9_]+/', $morada) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $morada)) || $localidade == "")  
									{ 
										if ($isEmp == 0) 
										{
											$emp = $_POST["nomeEmpresa"];
											if (preg_match('/[a-zA-Z0-9_]+/', $emp) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $emp) || $emp == "")
											{
												if (!$emp == "") {
													$idEmpSTR = "SELECT id FROM empresa
															WHERE nome = '$emp'";
													$idEmpQ = mysqli_query($link, $idEmpSTR);
													$idEmp = mysqli_fetch_array($idEmpQ)[0];
												} else {
													$idEmp= "NULL";
												}		
												$faz_actualizar=mysqli_query($link, "Update pessoas SET id_empresa=$idEmp WHERE id_contacto = $id")or die();

											} else
											{
												echo '<p id="err">A empresa que inseriu não é válida</p>';
											}
										} 

										$getUserSTR = "SELECT login FROM Users
													   WHERE id_contacto = $id";
										$getUserQ = mysqli_query($link, $getUserSTR);
										$getUser = mysqli_fetch_array($getUserQ)[0];

										if (strlen($getUser) > 0) 
										{
											$faz_actualizar=mysqli_query($link, "Update Users SET login='$nome' WHERE id_contacto = $id")or die();
										} 

										$faz_actualizar=mysqli_query($link, "Update Contacto SET nome='".$nome."',morada='".$morada."',codP='".$codP."',area='".$area."',localidade='".$localidade."' WHERE id='".$id."'")or die();
										$faz_actualizar=mysqli_query($link, "Update Telefone SET telefone=".$tel.", telefone2=".$tel2." WHERE id_contacto='".$id."'")or die();
										$faz_actualizar=mysqli_query($link, "Update Email SET email=".$em.", email2=".$em2." WHERE id_contacto='".$id."'")or die();
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
{
	echo 'Erro: ' .$e->getMessage();
}
?>
		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Atualiza Contactos</h2>
			</header>
				<form action="editacont.php">
					<input type="submit" value="Voltar">
				</form>
		</section>
	</div>
<!-- /Page -->

</div>
<?php include("php/footer.php"); ?>

<!-- $faz_actualizar=mysqli_query($link, "Update Contacto SET isEmpresa='".$isEmpresa."',nome='".$nome."',morada='".$morada."',codP='".$codP."',area='".$Area."',localidade='".$localidade."' WHERE id='".$id."'")or die();
 -->


