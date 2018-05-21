<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<?php include("php/validar.php");?>
	<!-- Banner -->
		<div id="banner" class="container">
			<section>
				<p><strong>Utilizadores <?php echo $_SESSION['login']; ?></strong> </p>
				
			</section>
		</div>

	<!-- Extra -->
		<div id="extra">
			<div class="container">
				<div class="row2">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<section class="sec" > <a href="pesqpessoa.php" class="image featured"><img src="images/pessoas.jpg" alt=""></a>
							<div class="box">
								<p><strong>Pesquisar por Pessoa</strong> </p>
								<a href="pesqpessoa.php" class="button">Pesquisar</a> </div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<section class="sec"> <a href="pesqempresa.php" class="image featured"><img src="images/empresas.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Pesquisar por Empresa</strong> </p>
								<a href="pesqempresa.php" class="button">Pesquisar</a> </div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<section class="sec"> <a href="pesqlocalidade.php" class="image featured"><img src="images/localidades.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Pesquisar por Localidade</strong> </p>
								<a href="pesqlocalidade.php" class="button">Pesquisar</a> </div>
						</section>
					</div>
				</div>
				
			</div>
		</div>
<br><br>
</div>
	<!-- Copyright -->
		<?php include("php/footer.php"); ?>

	</body>
</html>