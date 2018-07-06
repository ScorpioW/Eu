<?php
	include("php/DB.php");
	include("php/validar.php");
	if ($_SESSION['user']['sess_type'] == 4)
	{
		header("location: paginareservada");
	}

	$checked = 'checked = "true"';
	$opt = "";
	$searchNome = "";
?>

<div id="page" class="container">
	<section>
		<header class="major">
			<h2>Pesquisa de Contactos</h2>
		</header>
		<form action="editacont" method="POST" autocomplete="off">
			<input type="checkbox" name="emp" id="emp" value="emp"<?php if(isset($_POST['emp'])){echo $checked;}?>/>
			<label for="emp">Empresas</label>
			<input type="checkbox" name="pes" id="pes" value="pes"<?php if(isset($_POST['pes'])){echo $checked;}?>/>&nbsp;&nbsp;&nbsp;
			<label for="pes">Pessoas</label><br>
			<input type="text" name="search" placeholder="Pesquise por Nome..." class="textbox"><br>
			<input type="submit" onclick="check()" name="submit" value="Pesquisar">
			<a href="homeAdmin"><input type="button" name="voltar" value="Voltar"></a>
			<p id="err"></p>
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
			$faz_lista=mysqli_query($link, $lista) or die(mysqli_error($link));
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
			<tr>
			<th>Editar<?php if ($_SESSION['user']['sess_type'] == 2 || $_SESSION['user']['sess_type'] == 1){echo '<th>Apagar';}?><th>Entidade<th>Nome<th>Telefone<th>Email<th>Localidade<th>Morada<th>Código Postal

			<?php
				for ($i=0;$i<$num_registos;$i++)
				{
					$registos=mysqli_fetch_array($faz_lista);

					$tel = wordwrap($registos['telefone'] , 3 , ' ' , true );
					$tel2 = wordwrap($registos['telefone2'] , 3 , ' ' , true );

					$idCont = $registos['id'];

					$lista2 = "SELECT extensao, id_contacto, Contacto.id
							FROM Interno, Contacto
							WHERE Interno.id_contacto = $idCont";
					$faz_lista2 = mysqli_query($link, $lista2) or die(mysqli_error($link));
					
					if (!$faz_lista2) {
						printf("Error: %s\n", mysqli_error($link));
						exit();
					}

					if ($registos2 = mysqli_fetch_array($faz_lista2)[0]) 
					{
						$ext = $registos2;
					} else
					{
						$ext = "";
					}
					
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
						$pessQ = mysqli_query($link, $pessSTR) or die(mysqli_error($link));
						$idEmp = mysqli_fetch_array($pessQ)[0];
						if (is_null($idEmp))
						{
							$empresa = '<img src="images/noChecked.png" />'; 
						} else
						{
							$qSTR = "SELECT nome FROM empresa
									WHERE id = $idEmp";
							$empresaQ = mysqli_query($link, $qSTR) or die(mysqli_error($link));
							$empresa = mysqli_fetch_array($empresaQ)[0];
						}
						$empLink = "<tr>";
					} else 
					{
						$id=utf8_encode($registos[0]);
						$pessSTR = "SELECT id FROM empresa
									WHERE id_contact = $id";
						$pessQ = mysqli_query($link, $pessSTR) or die(mysqli_error($link));
						$idEmp = mysqli_fetch_array($pessQ);
						$empresa = '<img src="images/checked.png" />'; 
						$empLink = '<tr style="cursor: pointer;" onclick=\'window.location.href="empregados?id='.$idEmp[0].'"\'>';
					}

					echo $empLink;
					echo '<td><a href="editacont2?id='.$registos[0].'">Editar</a></td>';
					if ($_SESSION['user']['sess_type'] == 2 || $_SESSION['user']['sess_type'] == 1)
					{
						echo '<td><a href="apagarcont?id='.$registos[0].'">Apagar</a></td>';	
					}
					echo '<td>' .$empresa. '</td>';
					echo '<td>' .$registos["nome"]. '</td>';
					echo '<td>' .$tel. ' '.$tel2.'</td>';
					echo '<td>' .$registos["email"]. ' <br> '.$registos['email2'].'</td>';
					echo '<td>' .$registos["Localidade"]. '</td>';
					echo '<td>' .$registos["morada"]. '</td>';
					echo '<td>' .$registos["codP"]. ' - '.$registos["area"].'</td>';
					echo '</tr>';
				}
			?>
		</table>
		<br>
		</section>
	</div>
</div>
<?php include("php/footer.php"); ?>