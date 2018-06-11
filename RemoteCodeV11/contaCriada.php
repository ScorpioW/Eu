<?php  
	header('Content-Type: text/html; charset=UTF-8');
	include('php/validarAdmin.php');
?>
<?php
if (isset($_SERVER['HTTP_REFERER'])) {
$ref_url = $_SERVER['HTTP_REFERER'];
}else{
$ref_url = 'No referrer set';
}
?>

<!-- Page -->
	<div id="page" class="container">
		<section>
			<h1>Criar Conta</h1><br>
			<p id="sucess">Registo criado com sucesso!</p>
			<form action="homeAdmin.php" method="POST" autocomplete="off">
			<input type="submit"  value="Voltar">
			</form>
		</section>		
	</div>
<!-- /Page -->
</div>
	<?php include("php/footer.php"); ?>
