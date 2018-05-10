<!DOCTYPE HTML>

<html>
	<?php include("php/header.php"); ?>
	<!-- Header -->

	<!-- Page -->
		<div id="page" class="container">
			<section>
				<form method="POST">
					<h2>Pesquisa uma localidade</h2>
					<input type="text" name="localidade" class="textbox"><br>
					<input type="submit" name="submit" value="Pesquisar">
					<input type="reset" value="Limpar">
				</form>
			</section>
		</div>
		<?php include("php/pesqlocalidade2.php"); ?>
	<!-- /Page -->

	<!-- Copyright -->
		<?php include("php/footer.php"); ?>

	</body>
</html>