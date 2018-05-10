<?php  
include("../php/DB.php");
$id=$_GET['id'];
$faz_editar=mysqli_query($link,"SELECT isEmpresa, nome, morada, codP, area, Localidade, telefone, email
            FROM Contacto, Telefone, Email
            WHERE Contacto.id = Telefone.id_contacto AND Contacto.id = Email.id_contacto AND id='$id'
            GROUP BY nome ");

$registos=mysqli_fetch_array($faz_editar);
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
				<h2>Editar Contactos</h2>
			</header>
						<form action="atualizac.php?id=<?php echo $id;?>" method="POST">
							isEmpresa:
							<input type="numeric" name="isEmpresa" size="2" value='<?php echo $registos['isEmpresa'];?>'>
							Nome:
							<input type="text" name="nome" size="2" value='<?php echo $registos['nome'];?>'>
							<br>Morada:
							<input type="text" name="morada" size="2" value='<?php echo $registos['morada'];?>'>
							<br>Codigo Postal
							<input type="text" name="codP" size="2" value='<?php echo $registos['codP'];?>'>
							<br>Area
							<input type="text" name="area" size="2" value='<?php echo $registos['area'];?>'>
							<br>Localidade
							<input type="text" name="localidade" size="2" value='<?php echo $registos['localidade'];?>'>
							<br>Telefone
							<input type="text" name="telefone" size="2" value='<?php echo $registos['telefone'];?>'>
							<br>Email
							<input type="text" name="email" size="2" value='<?php echo $registos['email'];?>'>
							
							<br><input type="submit" value="Actualizar"><br>
						</form>
						


							
						
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php"); ?>
	</body>
</html>