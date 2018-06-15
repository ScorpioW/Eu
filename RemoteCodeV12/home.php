<?php include("php/validar.php");?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<div id="banner" class="container">
	<section>
		<p>
			<!-- <a href="#"> -->
				<strong><?php echo $_SESSION['user']['login'];/* echo'   <i class="fas fa-cog"></i>'; */?></strong>
			<!-- </a> -->
		</p>
	</section>
</div>
	<div id="extra">
		<div class="container">
			<div class="row2">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec" > 
						<a href="pesqpessoa" class="image featured">
							<div class="overlay black caixa">
								<img src="images/pessoas.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Pessoas</strong></p>
							<a href="pesqpessoa" class="button">Pesquisar</a> 
						</div>
					</section>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec"> 
						<a href="pesqempresa" class="image featured">
							<div class="overlay black caixa">
								<img src="images/empresas.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Empresas</strong></p>
							<a href="pesqempresa" class="button">Pesquisar</a>
						</div>
					</section>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec"> 
						<a href="pesqlocalidade" class="image featured">
							<div class="overlay black caixa">
								<img src="images/localidades.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Localidade</strong></p>
							<a href="pesqlocalidade" class="button">Pesquisar</a>
						</div>
					</section>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec"> 
						<a href="pesqinternos" class="image featured">
							<div class="overlay black caixa">
								<img src="images/continternos.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Internos</strong></p>
							<a href="pesqinternos" class="button">Pesquisar</a>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div><br><br>
</div>

<?php include("php/footer.php"); ?>