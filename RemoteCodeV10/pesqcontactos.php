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

	<!-- Page -->
		<div id="page" class="container">
			<section>
				<header class="major">
					<h2>Pesquisa de Pessoas</h2>
				</header>
				<table class="default">
					<tr onclick="document.location='index.php'" onmouseover="" style="cursor: pointer;"><td><b> Nome <td><b>Morada<td><b>Código-Postal<td><b>Localidade<td><b>Telefone<td><b>Email
				<?php  
				for ($i=0;$i<$num_registos;$i++)
				{
					$registos=mysqli_fetch_array($faz_lista); ?>
					<tr onclick="document.location='index.php'" onmouseover="" style="cursor: pointer;">
					<?php
					echo '<td>'.$registos["nome"]. '</td>';
					echo '<td>'.$registos["morada"]. '</td>';
					echo '<td>'.$registos["codP"]. ' - '.$registos['area'].'</td>';
					echo '<td>'.$registos["Localidade"]. '</td>';
					echo '<td>'.$registos["telefone"]. '</td>';
					echo '<td>'.$registos["email"]. '</td>';
					echo '</tr>';
				}
				?>
				</table>
				<br>
			</section>
		</div>
	</div>
<?php include("php/footer.php"); ?>