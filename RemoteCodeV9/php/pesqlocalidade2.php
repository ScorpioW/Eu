<?php  
	header('Content-Type: text/html; charset=UTF-8');
		include("php/DB.php");
		$opt = "";
		$localidade = "";
		if (isset($_POST['submit']))
		{			
			$localidade = $_POST['localidade'];
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

		$existe="SELECT isEmpresa, nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
			FROM Contacto, Telefone, Email 
			WHERE Contacto.Localidade LIKE '%$localidade%' 
			AND Contacto.id = Telefone.id_contacto 
			AND Contacto.id = Email.id_contacto
			$opt
			ORDER BY nome ASC";

		
		$se_existe=mysqli_query($link, $existe);
		if (mysqli_num_rows($se_existe)>0)
		{
			$num_registos=mysqli_num_rows($se_existe); 
			$resposta='Contacto(s) encontrado(s) ' .$num_registos; ?>	

			<div id="page" class="container">
					<section>
						
							<h2>Pesquisa registos</h2>
							<br>
								<table class="default" id="grande">
								<tr><th>Nome<th>Telefone<th>Email<th>Localidade<th>Morada<th>Codigo Postal
							
							<?php  
							
							for ($i=0;$i<$num_registos;$i++)
							{
								$registos=mysqli_fetch_array($se_existe);
								if ($registos['codP'] == 0 && $registos['area'] == 0)
								{
									$registos['codP'] = ""; 
									$registos['area'] = "";
								}
								echo '<tr>';
								echo '<td>'.$registos["nome"]. '</td>';
								echo '<td>'.$registos["telefone"]. ' <br> '.$registos['telefone2'].'</td>';
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
		}
		else
		{
			echo '<p id="err">Não foi encontrado nenhum contacto de '.$localidade.'</p>';
			
		}
?>
</div> 