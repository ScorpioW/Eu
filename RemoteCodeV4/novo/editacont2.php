<?php  
include("../php/DB.php");
$id=$_GET['id'];
$lista="SELECT isEmpresa, nome, morada, codP, area, Localidade, telefone, email
            FROM Contacto, Telefone, Email
			WHERE Contacto.id = Telefone.id_contacto AND Contacto.id = Email.id_contacto AND Contacto.id = $id";
$faz_editar=mysqli_query($link, $lista);
$registos=mysqli_fetch_array($faz_editar);
?>

<!DOCTYPE HTML>

<html>
<?php include("../php/header.php"); ?>		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Contactos</h2>
			</header>
						<form action="atualizacont.php?id=<?php echo $id;?>" method="POST">
							isEmpresa:
							<input type="numeric" name="isEmpresa"  value='<?php echo $registos['isEmpresa'];?>'> <br>
							Nome:
							<input type="text" name="nome" value='<?php echo $registos['nome'];?>'>
							<br>Morada:
							<input type="text" name="morada" value='<?php echo $registos['morada'];?>'>
							<br>Codigo Postal
							<input type="text" name="codP" value='<?php echo $registos['codP'];?>'>
							<br>Area
							<input type="text" name="area" value='<?php echo $registos['area'];?>'>
							<br>Localidade
							<input type="text" name="localidade" value='<?php echo $registos['Localidade'];?>'>
							<br>Telefone
							<input type="text" name="telefone" value='<?php echo $registos['telefone'];?>'>
							<br>Email
							<input type="text" name="email" value='<?php echo $registos['email'];?>'>
							
							<br><input type="submit" value="Actualizar"><br>
						</form>
						


							
						
	</div>
<!-- /Page -->

</div>
	<?php include("../php/footer.php"); ?>
	</body>
</html>