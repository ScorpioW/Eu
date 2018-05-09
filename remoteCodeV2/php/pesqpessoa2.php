<?php  
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$pessoa = $_POST['pessoa'];
		
		
		$existe="SELECT * FROM pessoas Where nome LIKE '%".$pessoa."%'";
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
								<tr><td><b> ID <td><b>Nome<td><b>id_empresa<td><b>id_contacto
							
							<?php  
							
							for ($i=0;$i<$num_registos;$i++)
							{
								$registos=mysqli_fetch_array($se_existe);
								echo '<tr>';
								echo '<td>'.$registos["id"]. '</td>';
								echo '<td>'.$registos["nome"]. '</td>';
								echo '<td>'.$registos["id_empresa"]. '</td>';
								echo '<td>'.$registos["id_contacto"]. '</td>';
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