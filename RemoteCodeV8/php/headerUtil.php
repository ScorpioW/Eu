<?php
	if (!isset($_SESSION['login']))
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

		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div class="wrapper style1">

				<!-- Header -->
					<div id="header" style="height: 70px;" class="skel-panels-fixed">
						<div id="logo">
							<h5><a href="index.php">Contacto</a> <span class="tag">ParSis</span></h5>
							
						</div>
						<nav id="nav">
							<ul>
                                <li><a href="home.php">Home</a></li>
                                <li class="active"><a href="https://chrome.google.com/webstore/detail/google-voice-by-google/kcnhkahnjcbndmmehfkdnkjomaanaooo">Plugin</a></li>
								<li><a href="sobrenos.php">Sobre</a></li>
								<li><a href="php/logout.php"><?php echo $myVar?></a></li>
							</ul>
						</nav>
					</div>
				<!-- Header -->
