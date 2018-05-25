<!DOCTYPE HTML>

<html>
		<?php include("php/validar.php");?>
		

	<!-- Page -->
		<div id="page" class="container margincont">
			<section>
				<form method="POST" autocomplete="off">
					<h1>Pesquisa uma Localidade</h1><br><br>
					<h4>O que Pretende Procurar:</h4><br>
					<h5>Pessoa <input type="radio" name="search" value="0" checked="true"> &nbsp; &nbsp; 
					Empresa <input type="radio" name="search" value="1"><br><br></h5>
					<input type="text" name="localidade" placeholder="Localidade..." class="textbox"><br>
					<input type="submit" name="submit" value="Pesquisar">
					<input type="reset" value="Limpar">
					<a href="home.php"><input type="button" name="voltar" value="Voltar"></a>
				</form>
			</section>
			<?php include("php/pesqlocalidade2.php"); ?>
		</div>
	<!-- /Page -->
	</div>
	<!-- Copyright -->
		<?php include("php/footer.php"); ?>

	</body>
</html>