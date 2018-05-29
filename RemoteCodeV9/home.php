	<?php include("php/validar.php");?>
	<!-- Banner -->
		<div id="banner" class="container">
			<section>
				<p><strong><?php echo $_SESSION['login']; ?></strong> </p>
			</section>
		</div>

	<!-- Extra -->
		<div id="extra">
			<div class="container">
				<div class="row2">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<section class="sec" > <a href="pesqpessoa.php" class="image featured"><img src="images/pessoas.jpg" alt=""></a>
							<div class="box">
								<p><strong>Pessoas</strong> </p>
								<a href="pesqpessoa.php" class="button">Pesquisar</a> </div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<section class="sec"> <a href="pesqempresa.php" class="image featured"><img src="images/empresas.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Empresas</strong> </p>
								<a href="pesqempresa.php" class="button">Pesquisar</a> </div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<section class="sec"> <a href="pesqlocalidade.php" class="image featured"><img src="images/localidades.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Localidade</strong> </p>
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