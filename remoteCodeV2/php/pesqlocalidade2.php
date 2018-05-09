<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
		{
			include("php/DB.php");
			$localidade = $_POST['localidade'];
			
			
			$existe="SELECT * FROM Contacto Where Localidade LIKE '%".$localidade."%'";
			$se_existe=mysqli_query($link, $existe);
			if (mysqli_num_rows($se_existe)>0)
			{
				$num_registos=mysqli_num_rows($se_existe); 
				$resposta='localidade(s) encontrada(s) ' .$num_registos; ?>	

				<div id="page" class="container">
						<section>
							
								<h2>Pesquisa registos</h2>
								<br>
									<table border="1" style="">
									<tr><td><b> ID <td><b>Nome<td><b>id_empresa<td><b>id_contacto<td><b>Código Postal<td><b>Area <td><b>Localidade
								
								<?php  
								
								for ($i=0;$i<$num_registos;$i++)
								{
									$registos=mysqli_fetch_array($se_existe);
									echo '<tr>';
									echo '<td>'.$registos["id"]. '</td>';
									echo '<td>'.$registos["isEmpresa"]. '</td>';
									echo '<td>'.$registos["nome"]. '</td>';
									echo '<td>'.$registos["morada"]. '</td>';
									echo '<td>'.$registos["codP"]. '</td>';
									echo '<td>'.$registos["area"]. '</td>';
									echo '<td>'.$registos["Localidade"]. '</td>';
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
				$resposta='Registos com essa localidade não encontrados';
				
			}
	}
?>