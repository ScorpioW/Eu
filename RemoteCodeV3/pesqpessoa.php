
<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<?php include("php/header.php"); ?>
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
					<h2>Pesquisa nome de uma pessoa</h2>
					<input type="text" name="pessoa" class="textbox"><br>
					<input type="submit" name="submit" value="Pesquisar">
					<input type="reset" value="Limpar">
				</form>
			</section>
		</div>
		<?php include("php/pesqpessoa2.php"); ?>
	<!-- /Page -->

	<!-- Copyright -->
		<?php include("php/footer.php"); ?>

	</body>
</html>