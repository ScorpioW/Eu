<?php
	include("php/DB.php");
	include("php/validarAdmin.php");
	$lista="SELECT Contacto.id, isEmpresa, Contacto.nome, morada, codP, area, Localidade, telefone, telefone2, email, email2
	FROM Contacto, Telefone, Email
	WHERE Contacto.id = Telefone.id_contacto 
	AND Contacto.id = Email.id_contacto
	ORDER BY nome";
	$faz_lista=mysqli_query($link, $lista);
	$num_registos=mysqli_num_rows($faz_lista);
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
						$empresa = "";
						if ($registos["isEmpresa"] == 0)
						{ 
							$id=utf8_encode($registos[0]);
							$pessSTR = "SELECT id_empresa FROM pessoas
										WHERE id_contacto = $id";
							$pessQ = mysqli_query($link, $pessSTR);
							$idEmp = mysqli_fetch_array($pessQ)[0];
							if (is_null($idEmp))
							{
								$empresa = "Não";
							} else
							{
								$qSTR = "SELECT nome FROM empresa
										WHERE id = $idEmp";
								$empresaQ = mysqli_query($link, $qSTR);
								$empresa = mysqli_fetch_array($empresaQ)[0];
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
						echo '<td> <a href="editacont2.php?id='.$registos[0].'">Editar</a></td>';
						echo '<td> <a href="apagarcont.php?id='.$registos[0].'">Apagar</a></td>';	
						echo '</tr>';
					}
				?>
				</table>
				<br>
		</section>
	</div>
</div>
<!-- Copyright -->
<?php include("php/footer.php"); ?>