<?php  
$id=$_GET['id'];
$nome=$_POST['login'];
$direitos=$_POST['direitos'];
include("DB.php");
include("validarAdmin.php");
if (preg_match('/[a-zA-Z0-9_]+/', $nome) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $nome) && strlen($nome) >= 4) 
{
	$faz_actualizar=mysqli_query($link, "Update Users SET login='".$nome."',direitos='".$direitos."' WHERE id_contacto='".$id."'")or die();
	$faz_actualizar=mysqli_query($link, "Update Contacto SET nome='".$nome."' WHERE id ='".$id."'")or die();
	$faz_actualizar=mysqli_query($link, "Update pessoas SET nome='".$nome."' WHERE id_contacto ='".$id."'")or die();
} else
{
	echo '<p id="err">Username Inválido!</p>';
}
?>
<!-- Page -->
<div id="page" class="container">
		<section>			
			<form action="../editauser.php">
				<input type="submit" value="Voltar">
			</form>
		</section>
	</div>
<!-- /Page -->

</div>
<?php include("footer.php"); ?>