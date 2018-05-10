<?php	
	include("php/DB.php");
	include("php/validar.php");
    $lista="SELECT nome, morada, codP, area, Localidade, telefone, email
            FROM Contacto, Telefone, Email
            WHERE Contacto.id = Telefone.id_contacto AND Contacto.id = Email.id_contacto
            GROUP BY nome";
	$faz_lista=mysqli_query($link, $lista);
	$num_registos=mysqli_num_rows($faz_lista);
	if ($num_registos==0)
	{
		echo "<p>Nao existem registos!";
		echo "<br>";
		echo '<a href="Registo.html"> Inserir Registo </a>';
		exit;
	}
	else 
	{
		
	}
?>

<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<?php include("php/header.php"); ?>				<!-- Header -->

				<!-- Page -->
					<div id="page" class="container">
						<section>
								<h2>Pesquisa registos</h2>
								<br>
								<table border="1">
								<tr><td><b>Nome<td><b>Morada<td><b>Código Postal<td><b>Area<td><b>Localidade<td><b>Telefone<td><b>Email <br>
								
								<?php  
								for ($i=0;$i<$num_registos;$i++)
								{
									$registos=mysqli_fetch_array($faz_lista);
									echo '<tr class="tabela">';
									echo '<td>'.$registos["nome"]. '</td>';
									echo '<td>'.$registos["morada"]. '</td>';
									echo '<td>'.$registos["codP"]. '</td>';
									echo '<td>'.$registos["area"]. '</td>';
									echo '<td>'.$registos["Localidade"]. '</td>';
									echo '<td>'.$registos["telefone"]. '</td>';
									echo '<td>'.$registos["email"]. '</td>';
									echo '</tr>';
								}
								?>
								</table><br>
						</section>
					</div>
				<!-- /Page -->

			</div>

	<!-- Copyright -->
		<?php include("php/footer.php"); ?>

	</body>
</html>