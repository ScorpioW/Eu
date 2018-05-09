<?php  

include("DB.php");
include("validar.php")

header('Content-Type: text/html; charset=UTF-8');
$procura="select * from Users";
$faz_procura=mysqli_query($link,$procura);
$num_registos=mysqli_num_rows($faz_procura);
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
										<?php
										if ($num_registos==0)
										{
											echo "<br><p>Nao existe registos!!!";
											
										}
										echo 'Nº Total de registos'.$num_registos;
										?>
										<body bgcolor="#9bd3ec">
										<br><br>
										<table border="1">
											<tr><td><b>Login<td><b>Pass<td><b>id_contacto<td><b>Direitos<td><b>Editar<td><b>Apagar
										<?php  
												for ($i=0;$i<$num_registos;$i++)
												{
												$registos=mysql_fetch_array($faz_procura);
												$id=utf8_encode($registos[0]);
												echo '<tr>';
												echo '<td>'.$registos["login"]. '</td>';
												echo '<td>'.$registos["pass"]. '</td>';
												echo '<td>'.$registos["id_contacto"]. '</td>';
												echo '<td>'.$registos["direitos"]. '</td>';
												echo '<td> <a href="editauser2.php?id='.$id.'">Editar</a></td>';
												echo '<td> <a href="apagaruser.php?id='.$id.'">Apagar</a></td>';

												echo '<tr>';
												}
										?>
										</table>
										<br>
										


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
