<?php  
include("../php/DB.php");
$id=$_GET['id'];
$faz_editar=mysqli_query($link,"Select * from Users where id='$id'");
$registos=mysqli_fetch_array($faz_editar);
?>
<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>No Sidebar - Phase Shift by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div class="wrapper style1">

				<!-- Header -->
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
						<form action="atualiza.php?id=<?php echo $id;?>" method="POST">
							Login:
							<input type="text" name="login" value='<?php echo $registos['login'];?>'>
							<br>Pass:
							<input type="text" name="pass" size="2" value='<?php echo $registos['pass'];?>'>
							<br>id_contacto
							<input type="text" name="id_contacto" size="2" value='<?php echo $registos['id_contacto'];?>'>
							<br>direitos
							<input type="text" name="direitos" size="2" value='<?php echo $registos['direitos'];?>'>
							
							<br><input type="submit" value="Actualizar"><br>
						</form>
						


							
						</section>
					</div>
				<!-- /Page -->

			</div>

	<!-- Copyright -->
		<div id="copyright">
			<div class="container"> <span class="copyright">Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)</span>
				<ul class="icons">
					<li><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
					<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
					<li><a href="#" class="fa fa-google-plus"><span>Google+</span></a></li>
				</ul>
			</div>
		</div>

	</body>
</html>