<?php  
include("../php/DB.php");
include("../php/validar.php");
header('Content-Type: text/html; charset=UTF-8');
$procura="select * from Users";
$faz_procura=mysqli_query($link,$procura);
$num_registos=mysqli_num_rows($faz_procura);
?>
<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php include("php/header.php"); ?>		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Users</h2>
				<?php
										if ($num_registos==0)
										{
											echo "<br><p>Nao existe registos!!!";
											
										}
										echo 'Nº Total de registos'.$num_registos;
										?>
										<body bgcolor="#9bd3ec">
										<br><br>
										<table border="1">
											<tr><td><b>Login<td><b>Pass<td><b>id_contacto<td><b>Direitos<td><b>Editar<td><b>Apagar
										<?php  
												for ($i=0;$i<$num_registos;$i++)
												{
												$registos=mysqli_fetch_array($faz_procura);
												$id=utf8_encode($registos[0]);
												echo '<tr>';
												echo '<td>'.$registos["login"]. '</td>';
												echo '<td>'.$registos["pass"]. '</td>';
												echo '<td>'.$registos["id_contacto"]. '</td>';
												echo '<td>'.$registos["direitos"]. '</td>';
												echo '<td> <a href="editauser2.php?id='.$id.'">Editar</a></td>';
												echo '<td> <a href="apagaruser.php?id='.$id.'">Apagar</a></td>';
												echo '<tr>';
												}
										?>
										</table>
										<br>
			</header>
			

			</form>
		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php"); ?>
	</body>
</html>