<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
		{
			include("php/DB.php");
			$pessoa = $_POST['pessoa'];
			
			
			$existe="SELECT nome, morada, codP, area, Localidade, telefone, email FROM Contacto, Telefone, Email Where nome LIKE '%$pessoa%'  AND Contacto.id = Telefone.id_contacto AND Contacto.id = Email.id_contacto AND Contacto.isEmpresa = 0";
			$se_existe=mysqli_query($link, $existe);
			if (mysqli_num_rows($se_existe)>0)
			{
				$num_registos=mysqli_num_rows($se_existe); 
				$resposta='Pessoa(s) encontrada(s) ' .$num_registos; ?>	

				<div id="page" class="container">
						<section>
							
								<h2>Pesquisa registos</h2>
								<br>
									<table border="1" style="">
									<tr><td><b>Nome<td><b>Morada<td><b>Codigo Postal<td><b>Localidade<td><b>Telefone<td><b>Email
								
								<?php  
								
								for ($i=0;$i<$num_registos;$i++)
								{
									$registos=mysqli_fetch_array($se_existe);
									echo '<tr>';
									echo '<td>'.$registos["nome"]. '</td>';
									echo '<td>'.$registos["morada"]. '</td>';
									echo '<td>'.$registos["codP"]. '-'.$registos["area"]. '</td>';
									echo '<td>'.$registos["Localidade"]. '</td>';
									echo '<td>'.$registos["telefone"]. '</td>';
									echo '<td>'.$registos["email"]. '</td>';
									echo '</tr>';
								}
								echo ("<p>$resposta</p>");
								?>
								</table>
								<br>
						</section>
					</div> 
				<?php 
			}
			else
			{
				$resposta='Pessoa Não encontrada';
				
			}
	}
?>