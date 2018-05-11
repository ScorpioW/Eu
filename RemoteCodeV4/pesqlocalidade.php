<!DOCTYPE HTML>

<html>
		<?php include("php/header.php"); 
		      include("php/validar.php");?>
		<div id="header" class="skel-panels-fixed">
			<div id="logo">
				<h1><a href="index.html">Phase Shift</a></h1>
				<span class="tag">by TEMPLATED</span>
			</div>
			<nav id="nav">
				<ul>
					<li class="active"><a href="index.html">Homepage</a></li>
					<li><a href="left-sidebar.html">Left Sidebar</a></li>
					<li><a href="right-sidebar.html">Right Sidebar</a></li>
					<li><a href="no-sidebar.html">No Sidebar</a></li>
				</ul>
			</nav>
		</div>
	<!-- Header -->

	<!-- Page -->
		<div id="page" class="container">
			<section>
				<form method="POST">
					<h2>Pesquisa uma Localidade</h2>
					<input type="text" name="localidade" placeholder="Localidade..." class="textbox"><br>
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