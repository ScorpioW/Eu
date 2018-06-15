<?php  
header('Content-Type: text/html; charset=UTF-8');
	include("php/DB.php");
	$empresa = "";
	
	if (isset($_POST['submit']))
	{
		if (strlen($_POST['empresa']) >= 1)
		{
			if (preg_match('/[a-zA-Z0-9_]+/', $_POST['empresa']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['empresa'])) 
			{
				$empresa = $_POST['empresa'];
			}
			else
			{
				echo '<p id="err">Nome Inválido!</p>';
				exit;
			}
		}
	}
	
	$existe="SELECT empresa.id, Contacto.nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
			FROM Contacto, Telefone, Email, empresa
			Where Contacto.nome LIKE '%$empresa%'
			AND Contacto.id = Telefone.id_contacto 
			AND Contacto.id = Email.id_contacto
			AND Contacto.id = empresa.id_contact
			AND Contacto.isEmpresa = 1
			AND Contacto.nome NOT LIKE '%".$_SESSION['user']['login']."%'
			ORDER BY Contacto.nome ASC";
	$se_existe=mysqli_query($link, $existe) or die(mysqli_error($link));
	if (mysqli_num_rows($se_existe)>0)
	{
		$num_registos=mysqli_num_rows($se_existe); ?>	

		<div id="page" class="container">
			<section>
				<table class="default" id="grande">
				<tr><th>Nome<th>Telefone<th>Email<th>Localidade<th>Morada<th>Codigo Postal</tr>
				
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
						echo "<tr style='cursor: pointer;' onclick=\"window.location.href='empregados?id=".$registos['id']."'\">";
						echo '<td>'.$registos["nome"]. '</td>';
						echo '<td>'.$tel. '<br> '.$tel2.'</td>';
						echo '<td>'.$registos["email"]. ' <br> '.$registos['email2'].'</td>';
						echo '<td>'.$registos["Localidade"]. '</td>';
						echo '<td>'.$registos["morada"].'</td>';
						echo '<td>'.$registos["codP"]. '-'.$registos["area"]. '</td>';
						echo '</tr>';
					}
				?>
				</table>
				<br>
			</section>
		</div> 
	<?php 
		}else
		{
			if (empty($empresa)) 
			{
				echo '<br><p id="err">Nenhuma empresa se encontra registada!</p>';
			} else
			{
				echo '<br><p id="err">'.$empresa.' não se encontra registado(a)!</p>';
			}
		}
	?>



