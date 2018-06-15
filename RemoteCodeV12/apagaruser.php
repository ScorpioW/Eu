<?php include("php/validarAdmin.php");?>
<?php
    if (isset($_SERVER['HTTP_REFERER'])) {
    $ref_url = $_SERVER['HTTP_REFERER'];
    }else{
	$ref_url = 'No referrer set';
	}
	if (strpos($ref_url, 'editauser') != True) 
	{
		header("location: paginareservada");
	}
	?>
	
<?php
	$id=$_GET['id'];
	include("php/DB.php");

	$apagar = "DELETE FROM Contacto WHERE id=$id";
	$faz_apagar=mysqli_query($link, $apagar) or die(mysqli_error($link)) or die(mysqli_error($link));
?>
<div id="page" class="container">
	<section>
		<h1>Apagar Conta</h1><br>
		<p id="sucess">Conta apagada com sucesso!</p>
		<form action="editauser" method="POST" autocomplete="off">
		<input type="submit" value="Voltar">
		</form>
	</section>		
</div>
	</div>
</div>
<?php include("php/footer.php"); ?>

