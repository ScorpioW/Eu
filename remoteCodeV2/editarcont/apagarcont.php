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
							<form action="editauser.php">
								<input type="submit" value="Voltar">
							</form>


							
		</section>
					
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php"); ?>
	</body>
</html>

<?php
	$id=$_GET['id'];
	include("../php/DB.php");
	// include("validar.php");
	$apagar = "DELETE from Contacto where id='$id'";
	$faz_apagar=mysqli_query($link, $apagar);
	echo "Apagado com sucesso!";
	
?>