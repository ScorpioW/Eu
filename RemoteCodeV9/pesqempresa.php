<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<?php include("php/validar.php");?>
	<!-- Header -->

	<!-- Page -->
		<div id="page" class="container margincont">
			<section>
				<form method="POST" autocomplete="off">
					<h2>Pesquisa nome Empresa</h2>
					<input type="text" name="empresa" placeholder="Nome da Empresa..." class="textbox"><br>
					<input type="submit" name="submit" value="Pesquisar">
					<input type="reset" value="Limpar">
					<a href="home.php"><input type="button" name="voltar" value="Voltar"></a>
				</form>
			</section>
			<?php include("php/pesqempresa2.php"); ?>
		</div>
		
	<!-- /Page -->
	</div>
	<!-- Copyright -->
		<?php include("php/footer.php"); ?>


