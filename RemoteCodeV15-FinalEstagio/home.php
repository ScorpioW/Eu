<?php include("php/validar.php");?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<div id="banner" class="container">
</div>
	<div id="extra">
		<div class="container">
			<div>
				<section>
					<h1 style="color: white;"><strong>Consultas</strong></h1>
					<div class="divBanner">
				</section>
			</div>
			<div class="row2">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec" > 
						<a href="pesqpessoa" class="image featured">
							<div class="overlay black caixa">
								<img src="images/pessoas.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<strong>Pesquisar Pessoas</strong>
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
							<strong>Pesquisar Empresa</strong>
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
							<strong>Pesquisar por Localidade</strong>
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
							<strong>Pesquisar Internos</strong>
						</div>
					</section>
				</div>
			</div>
			<?php
			if ($_SESSION['user']['sess_type'] != 5 && $_SESSION['user']['sess_type'] != 4)
			{ ?>
				<div>
					<section>
						<h1 style="color: white;"><strong>Inserção</strong></h1>
						<div class="divBanner">
					</section>
				</div>
				<div class="row2">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<section class="sec">
							<a href="criacontacto" class="image featured">
								<div class="overlay black caixa">
									<img src="images/novo.jpg" alt="">
								</div>
							</a>
							<div class="box">
							<strong>Inserir Contactos</strong>
							</div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<section class="sec">
							<a href="editacont" class="image featured">
								<div class="overlay black caixa">
									<img src="images/editar.jpg" alt="">
								</div>
							</a>
							<div class="box">
								<strong>Editar Contactos</strong>
							</div>
						</section>
					</div>
				</div>
			<?php }?>
		</div>
	</div><br><br>
</div>
<?php include("php/footer.php"); ?>