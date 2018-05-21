<?php  
include("php/DB.php");
header('Content-Type: text/html; charset=UTF-8');
$procura="SELECT * FROM Users";
$faz_procura=mysqli_query($link,$procura);
$num_registos=mysqli_num_rows($faz_procura);
include("php/validarAdmin.php");
?>
				<!-- Page -->
					<div id="page" class="container">
						<section>
							<?php
							if ($num_registos==0)
							{
								echo "<br><p>Nao existe registos!!!";
								
							}
							echo 'Nº Total de registos'.$num_registos;
							?>

							<table class="default">
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
						</section>
					</div>
				<!-- /Page -->
		</div>
<?php include("php/footer.php");?>