<?php  
	include("../php/DB.php");
    include("../php/validar.php");
    $lista="SELECT isEmpresa, nome, morada, codP, area, Localidade, telefone, email
            FROM Contacto, Telefone, Email
            WHERE Contacto.id = Telefone.id_contacto AND Contacto.id = Email.id_contacto";
	$faz_lista=mysqli_query($link, $lista);
	$num_registos=mysqli_num_rows($faz_lista);
	$lista2="SELECT id FROM Contacto";
    $faz_lista2=mysqli_query($link, $lista2);
   /*$registosid=mysqli_fetch_array($faz_lista2);
    $id=utf8_encode($registosid['id']);#vai buscar o id ?
    print_r($id. "<br>"); */
?>

<!DOCTYPE HTML>

<html>
<?php include("../php/header.php"); ?>		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
							
								<h2>Editar Contactos</h2>
								<br>
									<table border="1">
									<tr><td><b>Empresa<td><b>Nome<td><b>Morada<td><b>Código Postal<td><b>Area<td><b>Localidade<td><b>Telefone<td><b>Email<td><b>Editar<td><b>Apagar
								
								<?php  
								for ($i=0;$i<$num_registos;$i++)
								{
									$registos=mysqli_fetch_array($faz_lista);
                                    $registosid=mysqli_fetch_array($faz_lista2);
                                    $id=utf8_encode($registosid['id']); #vai buscar o id ?
                                    $empresa = "";
                                    if ($registos["isEmpresa"] == 0)
                                    {
                                        $qSTR = "SELECT nome FROM empresa
                                                WHERE empresa.id = $id";
                                        $empresaQ = mysqli_query($link, $qSTR);
                                        $empresaA = mysqli_fetch_array($empresaQ);
                                        $empresa = $empresaA[0];
                                    } else 
                                    {
                                        $empresa = "Sim";
                                    }

                                    echo '<tr>';
									echo '<td>'.$empresa. '</td>';
									echo '<td>'.$registos["nome"]. '</td>';
									echo '<td>'.$registos["morada"]. '</td>';
									echo '<td>'.$registos["codP"]. '</td>';
									echo '<td>'.$registos["area"]. '</td>';
                                    echo '<td>'.$registos["Localidade"]. '</td>';
                                    echo '<td>'.$registos["telefone"]. '</td>';
                                    echo '<td>'.$registos["email"]. '</td>';
                                    echo '<td> <a href="editacont2.php?id='.$id.'">Editar</a></td>';
									echo '<td> <a href="apagarcont.php?id='.$id.'">Apagar</a></td>';	
									echo '</tr>';
								}
								?>
	        </table>
	<br>
					
	</div>
<!-- /Page -->

</div>
	<?php include("../php/footer.php"); ?>
	</body>
</html>