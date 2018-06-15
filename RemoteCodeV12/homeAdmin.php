<?php include("php/validarAdmin.php");?>
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
					<section class="sec">
						<a href="adminreg" class="image featured">
							<div class="overlay black caixa">
								<img src="images/novo.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Users</strong></p>
							<a href="adminreg" class="button">Criar</a>
						</div>
					</section>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec">
						<a href="criacontacto" class="image featured">
							<div class="overlay black caixa">
								<img src="images/novo.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Contactos</strong></p>
							<a href="criacontacto" class="button">Criar</a>
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
							<p><strong>Contactos</strong></p>
							<a href="editacont" class="button">Editar</a>
						</div>
					</section>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
					<section class="sec"> 
						<a href="editauser" class="image featured">
							<div class="overlay black caixa">
								<img src="images/editar.jpg" alt="">
							</div>
						</a>
						<div class="box">
							<p><strong>Users</strong></p>
							<a href="editauser" class="button">Editar</a>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div><br><br>
</div>

<?php include("php/footer.php"); ?>