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
	$apagar = "DELETE from Users where id='$id'";
	$apagar2 = "DELETE FROM	Contacto WHERE id=$contID";
	$apagar3 = "DELETE FROM	Telefone WHERE id_contacto = $contID";
	$apagar4 = "DELETE FROM	Email WHERE id_contacto = $contID";
	$faz_apagar=mysqli_query($link, $apagar);
	$faz_apagar=mysqli_query($link, $apagar2);
	$faz_apagar=mysqli_query($link, $apagar3);
	$faz_apagar=mysqli_query($link, $apagar4);
	echo "<p id='err'>Apagado com sucesso!</p>";?>

		<form action="editauser.php">
			<input type="submit" value="Voltar">
		</form>
	</div>
</div>
<?php include("php/footer.php"); ?>