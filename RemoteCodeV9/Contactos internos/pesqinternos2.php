<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
		{
			include("php/DB.php");
			$pessoa = "";
			$err = "";?>	

				<div id="page" class="container">
						<section>
								<?php  
								if (strlen($_POST['pessoa']) >= 1)
								{
									if (preg_match('/[a-zA-Z0-9_]+/', $_POST['pessoa']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['pessoa'])) 
									{
										$pessoa = $_POST['pessoa'];
									}
									else
									{
										echo '<p id="err">Nome Inválido!</p>';
										exit;
									}
								}
								$existe="SELECT * from Internos
								ORDER BY nome ASC";
								$se_existe=mysqli_query($link, $existe);
								$num_registos=mysqli_num_rows($se_existe); 
								if ($num_registos>0)
								{
									echo 'Pessoa(s) encontrada(s) ' .$num_registos. '<br>'; 
								}
								else
								{
									echo '<p id="err">'.$pessoa.' não se encontra registado(a)!</p>';
									exit;
								}?>
								<br>
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
									echo '<td>'.$registos["telefone"].'</td>';
									echo '<td>'.$registos["email"]. ' <br> '.$registos['email2'].'</td>';
									echo '<td>'.$registos["local"]. '</td>';
									echo '</tr>';
								}
								?>
								</table>
								<br>
						</section>
					</div> 
				<?php 
	}
?>