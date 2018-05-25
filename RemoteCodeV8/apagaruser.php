<?php include("php/validarAdmin.php");?>
<?php
    if (isset($_SERVER['HTTP_REFERER'])) {
    $ref_url = $_SERVER['HTTP_REFERER'];
    }else{
	$ref_url = 'No referrer set';
	}
	if (strpos($ref_url, 'editauser.php') != True) 
	{
		header("location: paginareservada.php");
	}
	?>
	
<?php
	$id=$_GET['id'];
	include("php/DB.php");
	$contIDstr = "SELECT id_contacto FROM Users
			   WHERE id=$id";
	$contIDQ = mysqli_query($link, $contIDstr);
	$contID = mysqli_fetch_array($contIDQ)[0];
	$apagar = "DELETE FROM	Contacto WHERE id=$contID";
	$faz_apagar=mysqli_query($link, $apagar);
	echo "<p id='err'>Apagado com sucesso!</p>";?>

		<form action="editauser.php">
			<input type="submit" value="Voltar">
		</form>
	</div>
</div>
<?php include("php/footer.php"); ?>