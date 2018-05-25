<?php  
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$empresa = $_POST['empresa'];
		
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
		
		$existe="SELECT nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
				FROM Contacto, Telefone, Email 
				Where nome LIKE '%$empresa%'  
				AND Contacto.id = Telefone.id_contacto 
				AND Contacto.id = Email.id_contacto 
				AND Contacto.isEmpresa = 1
				ORDER BY nome ASC";
		$se_existe=mysqli_query($link, $existe);
		if (mysqli_num_rows($se_existe)>0)
		{
			$num_registos=mysqli_num_rows($se_existe); 
			$resposta='Empresa(s) encontrada(s) ' .$num_registos; ?>	

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
				</div> 
			<?php 
		}
		else
		{
			echo '<p id="err">'.$empresa.' não se encontra registado(a)!</p>';
			
		}
}
?>



