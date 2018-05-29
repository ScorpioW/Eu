<?php
	include("php/DB.php");
	include("php/validarAdmin.php");

	$checked = 'checked = "true"';
	$opt = "";
	$searchNome = "";
?>

<!-- Page -->
	<div id="page" class="container">
		<section>
				<form action="editacont.php" method="POST" autocomplete="off">
					<h1>Pesquisa de Contactos</h1><br>
					<input type="checkbox" name="emp" id="emp" value="emp"<?php if(isset($_POST['emp'])){echo $checked;}?>/>
					<label for="emp">Empresas</label>
					<input type="checkbox" name="pes" id="pes" value="pes"<?php if(isset($_POST['pes'])){echo $checked;}?>/>&nbsp;&nbsp;&nbsp;
					<label for="pes">Pessoas</label><br>
					<input type="text" name="search" placeholder="Pesquise por Nome..." class="textbox"><br>
					<input type="submit" name="submit" value="Pesquisar">
					<a href="homeAdmin.php"><input type="button" name="voltar" value="Voltar"></a>
				</form>
				<br>
				<?php
					if (isset($_POST['submit']))
					{
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
						if (strlen($_POST['search']) >= 1)
						{
							if (preg_match('/[a-zA-Z0-9_]+/', $_POST['search']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['search'])) 
							{
								$searchNome = "AND nome LIKE '%".$_POST['search']."%'";
							}
							else
							{
								echo $searchNome;
								echo '<p id="err">Nome Inválido</p>';
								exit;
							}
						}
					}
				$lista="SELECT Contacto.id, isEmpresa, Contacto.nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
				FROM Contacto, Telefone, Email
				WHERE Contacto.id = Telefone.id_contacto 
				AND Contacto.id = Email.id_contacto
				$opt
				$searchNome
				ORDER BY nome";
				$faz_lista=mysqli_query($link, $lista);
				if (!$faz_lista) {
					printf("Error: %s\n", mysqli_error($link));
					exit();
				}
				$num_registos=mysqli_num_rows($faz_lista);
				if ($num_registos < 1)
				{
					echo '<p id="err">'.$_POST['search'].' não se encontra registado(a)!</p>';
					exit;
				}
				?>
				<br>
				<table class="default" id="sgrande">
				<tr><th>Editar<th>Apagar<th>Nome<th>Empresa<th>Telefone<th>Email<th>Localidade<th>Morada<th>Código Postal
				
				<?php


					for ($i=0;$i<$num_registos;$i++)
					{
						$registos=mysqli_fetch_array($faz_lista);
						$empresa = "";

						if ($registos['codP'] == 0 && $registos['area'] == 0)
						{
							$registos['codP'] = ""; 
							$registos['area'] = "";
						}

						if ($registos["isEmpresa"] == 0)
						{ 
							$id=utf8_encode($registos[0]);
							$pessSTR = "SELECT id_empresa FROM pessoas
										WHERE id_contacto = $id";
							$pessQ = mysqli_query($link, $pessSTR);
							$idEmp = mysqli_fetch_array($pessQ)[0];
							if (is_null($idEmp))
							{
								$file_path = '/images/noChecked.png';
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
							$file_path = '/images/checked.png';
							$empresa = '<img src="images/checked.png" />'; 
						}
						
						echo '<tr>';
						echo '<td> <a href="editacont2.php?id='.$registos[0].'">Editar</a></td>';
						echo '<td> <a href="apagarcont.php?id='.$registos[0].'">Apagar</a></td>';	
						echo '<td>'.$registos["nome"]. '</td>';
						echo '<td>'.$empresa. '</td>';
						echo '<td>'.$registos["telefone"]. ' <br> '.$registos['telefone2'].'</td>';
						echo '<td>'.$registos["email"]. ' <br> '.$registos['email2'].'</td>';
						echo '<td>'.$registos["Localidade"]. '</td>';
						echo '<td>'.$registos["morada"]. '</td>';
						echo '<td>'.$registos["codP"]. ' - '.$registos["area"].'</td>';
						echo '</tr>';
					}
				?>
				</table>
				<br>
		</section>
	</div>
</div>
<!-- Copyright -->
<?php include("php/footer.php"); ?>