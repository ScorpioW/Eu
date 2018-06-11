<?php include("php/validar.php");?>
	<div id="page" class="container margincont">
		<section>
			<header class="major">
				<h2>Pesquisa de Empresas</h2>
			</header>
			<form method="POST" autocomplete="off">
				<input type="text" name="empresa" placeholder="Nome da Empresa..." class="textbox"><br>
				<input type="submit" name="submit" value="Pesquisar">
				<input type="reset" value="Limpar">
				<a href="home.php"><input type="button" name="voltar" value="Voltar"></a>
			</form>
		</section>
		<?php include("php/pesqempresa2.php"); ?>
	</div>	
</div>
<?php include("php/footer.php"); ?>


