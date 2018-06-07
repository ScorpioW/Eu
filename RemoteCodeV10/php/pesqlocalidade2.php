<?php  
	header('Content-Type: text/html; charset=UTF-8');
	include("php/DB.php");
	$opt = "";
	$localidade = "";
	if (isset($_POST['submit']))
	{
		if (strlen($_POST['localidade']) >= 1)
		{
			if (preg_match('/[a-zA-Z0-9_]+/', $_POST['localidade']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['localidade'])) 
			{
				$localidade = $_POST['localidade'];
			}else
			{
				echo '<p id="err">Nome Inválido!</p>';
				exit;
			}
		}

		if (isset($_POST['emp']) && !isset($_POST['pes'])) 
		{
			$opt = "AND isEmpresa = 1";
		} elseif (isset($_POST['pes']) && !isset($_POST['emp'])) 
		{
			$opt = "AND isEmpresa = 0";
		} elseif (isset($_POST['emp']) && isset($_POST['pes']))
		{
		} else
		{
			echo '<p id="err">Nenhum opção de pesquisa foi selecionada!</p>';
			exit;
		}
	}

	$existe="SELECT Contacto.id, isEmpresa, nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
		FROM Contacto, Telefone, Email 
		WHERE Contacto.Localidade LIKE '%$localidade%' 
		AND Contacto.id = Telefone.id_contacto 
		AND Contacto.id = Email.id_contacto
		$opt
		AND nome NOT LIKE '%".$_SESSION['user']['login']."%'
		ORDER BY nome ASC";

	$se_existe=mysqli_query($link, $existe);
	if (mysqli_num_rows($se_existe)>0)
	{
		$num_registos=mysqli_num_rows($se_existe); ?>	

		<div id="page" class="container">
			<section>
				<table class="default" id="grande">
				<tr><th>Nome<th>Telefone<th>Email<th>Localidade<th>Morada<th>Codigo Postal
				
				<?php  
					for ($i=0;$i<$num_registos;$i++)
					{
						$registos=mysqli_fetch_array($se_existe);

						$tel = wordwrap($registos['telefone'] , 3 , ' ' , true );
						$tel2 = wordwrap($registos['telefone2'] , 3 , ' ' , true );

						if ($registos['codP'] == 0 && $registos['area'] == 0)
						{
							$registos['codP'] = ""; 
							$registos['area'] = "";
						}

						$empresa = "";

						if ($registos["isEmpresa"] == 0)
						{ 
							$id=utf8_encode($registos[0]);
							$pessSTR = "SELECT id_empresa FROM pessoas
										WHERE id_contacto = $id";
							$pessQ = mysqli_query($link, $pessSTR);
							$idEmp = mysqli_fetch_array($pessQ)[0];
							if (is_null($idEmp))
							{
								$empresa = '<img src="images/noChecked.png" />'; 
							} else
							{
								$qSTR = "SELECT nome FROM empresa
										WHERE id = $idEmp";
								$empresaQ = mysqli_query($link, $qSTR);
								$empresa = mysqli_fetch_array($empresaQ)[0];
							}
						} else 
						{
							$empresa = '<img src="images/checked.png" />'; 
						}
						echo '<tr>';
						echo '<td>'.$registos["nome"]. '</td>';
						echo '<td>' .$empresa. '</td>';
						echo '<td>'.$tel. ' <br> '.$tel2.'</td>';
						echo '<td>'.$registos["email"]. ' <br> '.$registos['email2'].'</td>';
						echo '<td>'.$registos["Localidade"]. '</td>';
						echo '<td>'.$registos["morada"]. '</td>';
						echo '<td>'.$registos["codP"]. '-'.$registos["area"]. '</td>';
						echo '</tr>';
					}
				?>
				</table>
				<br>
			</section>
			<?php 
			}else
			{
				echo '<p id="err">Não foi encontrado nenhum contacto de '.$localidade.'</p>';
				
			}
			?>
		</div> 