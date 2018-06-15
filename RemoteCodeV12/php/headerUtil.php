<?php
	header("Cache-Control: max-age=300, must-revalidate"); 
	if (!isset($_SESSION['user']))
	{
		$myVar = 'Login';
	} else
	{
		$myVar = 'Logout';
	}
?>

<head>
		<title>Contactos</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- [if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif] -->
	</head>
	<body>
			<div class="wrapper style1">

					<div id="header" style="height: 70px;" class="skel-panels-fixed">
						<div id="logo">
							<h5><a href="http://192.168.209.8/Estagio/Contactos/">Contacto</a> <a href="http://www.parsis.pt/"><span class="tag">ParSis</span></a></h5>
							
						</div>
						<nav id="nav">
							<ul>
                                <li><a href="home">Página Inicial</a></li>
                                <li class="active"><a href="https://addons.mozilla.org/en-US/firefox/addon/noojee-click-for-asterisk/">Plugin</a></li>
								<li><a href="sobrenos">Sobre</a></li>
								<li><a href="php/logout"><?php echo $myVar?></a></li>
							</ul>
						</nav>
					</div>
