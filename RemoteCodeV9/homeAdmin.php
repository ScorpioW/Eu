<?php include("php/validarAdmin.php");?>
<!-- Banner -->
<div id="banner" class="container">
			<section>
				<p><strong><?php echo $_SESSION['login']; ?></p>
				
			</section>
		</div>

	<!-- Extra -->
		<div id="extra">
			<div class="container">
				<div class="row2">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 margcols">
					<section class="4u" style="width: 17em; margin: auto;"> <a href="pesquisaadmin.php" class="image featured"><img src="images/listar.jpg" alt=""></a>
						<div class="box">
							<p><strong>Listagem</strong> </p>
							<a href="pesquisaadmin.php" class="button">Pesquisar</a> </div>
					</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 margcols">
						<section class="4u" style="width: 17em; margin: auto;"> <a href="adminreg.php" class="image featured"><img src="images/novo.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Users</strong> </p>
								<a href="adminreg.php" class="button">Criar</a> </div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 margcols">
						<section class="4u" style="width: 17em; margin: auto;"> <a href="criacontacto.php" class="image featured"><img src="images/novo.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Contactos</strong> </p>
								<a href="criacontacto.php" class="button">Criar</a> </div>
						</section>
					</div>
				</div>
				<div class="row2">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margcols">
						<section class="4u" style="width: 17em; margin: auto;"> <a href="editacont.php" class="image featured"><img src="images/editar.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Contactos</strong> </p>
								<a href="editacont.php" class="button">Editar</a> </div>
						</section>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margcols">
						<section class="4u" style="width: 17em; margin: auto;"> <a href="editauser.php" class="image featured"><img src="images/editar.jpg"  alt=""></a>
							<div class="box">
								<p><strong>Users</strong> </p>
								<a href="editauser.php" class="button">Editar</a> </div>
						</section>
					</div>
				</div>
			</div>
		</div>
	<br><br>
</div>
	<!-- Copyright -->
<?php include("php/footer.php"); ?>
