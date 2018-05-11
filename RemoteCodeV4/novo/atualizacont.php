<?php  
$id=$_GET['id'];
$isEmpresa=$_POST['isEmpresa'];
$nome=$_POST['nome'];
$morada=$_POST['morada'];
$codP=$_POST['codP'];
$Area=$_POST['area'];
$localidade=$_POST['localidade'];
$telefone=$_POST['telefone'];
$email=$_POST['email'];
include("../php/DB.php");
$faz_actualizar=mysqli_query($link, "Update Contacto SET isEmpresa='".$isEmpresa."',nome='".$nome."',morada='".$morada."',codP='".$codP."',area='".$Area."',localidade='".$localidade."' WHERE id='".$id."'")or die();
($faz_actualizar) ? print 'Dados alterados com sucesso' : die('Falha ao alterar dados');
$faz_actualizar=mysqli_query($link, "Update Telefone SET telefone='".$telefone."' WHERE id_contacto='".$id."'")or die();
($faz_actualizar) ? print 'Dados alterados com sucesso' : die('Falha ao alterar dados');
$faz_actualizar=mysqli_query($link, "Update Email SET email='".$email."' WHERE id_contacto='".$id."'")or die();
($faz_actualizar) ? print 'Dados alterados com sucesso' : die('Falha ao alterar dados');
?>

<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php include("../php/header.php"); ?>		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Atualiza Contactos</h2>
			</header>


							<form action="editacont.php">
								<input type="submit" value="Voltar">
							</form>

		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("../php/footer.php"); ?>
	</body>
</html>