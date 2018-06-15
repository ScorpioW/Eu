<?php
	include('php/validarAdmin.php');
	if (isset($_SERVER['HTTP_REFERER'])) 
	{
		$ref_url = $_SERVER['HTTP_REFERER'];
	}else
	{
		$ref_url = 'No referrer set';
	}

	if (strpos($ref_url, 'contpessoa') != True && strpos($ref_url, "adminreg") != True && strpos($ref_url, "contempresa") != True) 
	{
		header("location: paginareservada");
	}
?>
	<div id="page" class="container">
		<section>
			<h1>Criar Conta</h1><br>
			<p id="sucess">Registo criado com sucesso!</p>
			<form action="homeAdmin" method="POST" autocomplete="off">
			<input type="submit"  value="Voltar">
			</form>
		</section>		
	</div>
</div>
	<?php include("php/footer.php"); ?>
