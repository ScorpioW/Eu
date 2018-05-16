<?php  
	include("php/DB.php");
	include("php/validarAdmin.php");
	$lista="Select * from Users";
	$faz_lista=mysqli_query($link, $lista);
	$num_registos=mysqli_num_rows($faz_lista);
	if ($num_registos==0)
	{
		echo "<p>Nao existem registos!";
		echo "<br>";
		echo '<a href="Registo.html"> Inserir Registo </a>';
		exit;
	}
?>

		<!-- Page -->
			<div id="page" class="container">
				<section>
					
						<h2>Pesquisa registos</h2>
						<br>
							<table class="default" id="pequeno">
							<th>ID <th>Login<th>Password<th>id_contacto<th>direitos
						
						<?php  
						for ($i=0;$i<$num_registos;$i++)
						{
							$registos=mysqli_fetch_array($faz_lista);
							echo '<tr>';
							echo '<td>'.$registos["id"]. '</td>';
							echo '<td>'.$registos["login"]. '</td>';
							echo '<td>'.$registos["pass"]. '</td>';
							echo '<td>'.$registos["id_contacto"]. '</td>';
							echo '<td>'.$registos["direitos"]. '</td>';
							echo '</tr>';
						}
						?>
						</table>
						<br>
				</section>
			</div>
		<!-- /Page -->
	</div>
<!-- Copyright -->
<?php include("php/footer.php"); ?>