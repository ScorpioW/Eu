<?php  
	include("../php/DB.php");
	include("../php/validar.php");
    $lista="SELECT Contacto.id, isEmpresa, nome, morada, codP, area, Localidade, telefone, email
            FROM Contacto, Telefone, Email
            WHERE Contacto.id = Telefone.id_contacto AND Contacto.id = Email.id_contacto
            GROUP BY nome";
	$faz_lista=mysqli_query($link, $lista);
	$num_registos=mysqli_num_rows($faz_lista);
	$lista2="SELECT id
            FROM Contacto";
	$faz_lista2=mysqli_query($link, $lista2);
    $reg = mysqli_fetch_array($faz_lista2);
    echo ($reg['id']);
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
									<tr><td><b>isEmpresa<td><b>Nome<td><b>Morada<td><b>Código Postal<td><b>Area<td><b>Localidade<td><b>Telefone<td><b>Email<td><b>Editar<td><b>Apagar
								
								<?php  
								for ($i=0;$i<$num_registos;$i++)
								{
									$registos=mysqli_fetch_array($faz_lista);
									$registosid=mysqli_fetch_array($faz_lista2);
									$id=utf8_encode($registos['id']);#vai buscar o id ?
									echo '<tr>';
									echo '<td>'.$registos["isEmpresa"]. '</td>';
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