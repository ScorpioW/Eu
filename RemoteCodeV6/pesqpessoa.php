
<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<?php include("php/validar.php");?>
		

	<!-- Page -->
		<div id="page" class="container margincont">
			<section>
				<form method="POST" autocomplete="off">
					<h2>Pesquisa nome de uma pessoa</h2>
					<input type="text" name="pessoa" placeholder="Nome da Pessoa..." class="textbox"><br>
					<input type="submit" name="submit" value="Pesquisar">
					<input type="reset" value="Limpar">
				</form>
			</section>
			<?php include("php/pesqpessoa2.php"); ?>
		</div>
		
	<!-- /Page -->
</div>
	<!-- Copyright -->
		<?php include("php/footer.php"); ?>