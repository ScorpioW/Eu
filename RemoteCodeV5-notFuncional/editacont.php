<?php  
	include("php/DB.php");
	include("php/validarAdmin.php");
	$lista="SELECT isEmpresa, nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
            FROM Contacto, Telefone, Email
            WHERE Contacto.id = Telefone.id_contacto 
			AND Contacto.id = Email.id_contacto
			ORDER BY isEmpresa";
	$faz_lista=mysqli_query($link, $lista);
	$num_registos=mysqli_num_rows($faz_lista);
	$lista2="SELECT id FROM Contacto";
    $faz_lista2=mysqli_query($link, $lista2);
?>

		<!-- Page -->
			<div id="page" class="container">
				<section>
					
						<h2>Pesquisa registos</h2>
						<br>
							<table class="default" id="sgrande">
							<tr><th>Empresa<th>Nome<th>Morada<th>Código Postal<th>Localidade<th>Telefone<th>Email<th>Editar<th>Apagar
						
						<?php  
						for ($i=0;$i<$num_registos;$i++)
						{
							$registos=mysqli_fetch_array($faz_lista);
							$registosid=mysqli_fetch_array($faz_lista2);
							$id=utf8_encode($registosid['id']);
							$empresa = "";
							if ($registos["isEmpresa"] == 0)
							{
								$qSTR = "SELECT nome FROM empresa
										WHERE empresa.id = $id";
								$empresaQ = mysqli_query($link, $qSTR);
								$empresaA = mysqli_fetch_array($empresaQ);
								if ($empresaA[0] == "")
								{
									$empresa = "Não";
								} else 
								{
									$empresa = $empresaA[0];
								}
							} else 
							{
								$empresa = "Sim";
							}

							echo '<tr>';
							echo '<td>'.$empresa. '</td>';
							echo '<td>'.$registos["nome"]. '</td>';
							echo '<td>'.$registos["morada"]. '</td>';
							echo '<td>'.$registos["codP"]. ' - '.$registos["area"].'</td>';
							echo '<td>'.$registos["Localidade"]. '</td>';
							echo '<td>'.$registos["telefone"]. ' <br> '.$registos['telefone2'].'</td>';
							echo '<td>'.$registos["email"]. ' <br> '.$registos['email2'].'</td>';
							echo '<td> <a href="editacont2.php?id='.$id.'">Editar</a></td>';
							echo '<td> <a href="apagarcont.php?id='.$id.'">Apagar</a></td>';	
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