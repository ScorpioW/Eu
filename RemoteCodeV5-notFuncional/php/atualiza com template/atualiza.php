<?php  
$id=$_GET['id'];
$nome=$_POST['login'];
$pass=$_POST['pass'];
$id_contacto=$_POST['id_contacto'];
$direitos=$_POST['direitos'];
include("../php/DB.php");
$faz_actualizar=mysqli_query($link, "Update Users SET login='".$nome."',pass='".$pass."',id_contacto='".$id_contacto."',direitos='".$direitos."' WHERE id='".$id."'")or die();
($faz_actualizar) ? print 'Dados alterados com sucesso' : die('Falha ao alterar dados');
include("../php/validarAdmin.php");?>

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

<?php include("../php/footer.php");?>