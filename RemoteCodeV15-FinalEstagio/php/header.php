<?php header("Cache-Control: max-age=300, must-revalidate"); 
	  if (session_status() == PHP_SESSION_NONE) 
	  {
		session_start();
	}
	  $editaLINK = '';
	  if (isset($_SESSION['user']))
	  {
		  $editaLINK = '<li><a href="editacont2?id='.$_SESSION['user']['idCont'].'">Editar '.$_SESSION['user']['login'].'</a></li>';
	  }?>
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
	<script src="js/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
	</noscript>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>
	<div class="wrapper style1">
		<div id="header" style="height: 70px;" class="skel-panels-fixed">
			<div id="logo">
			<h5><a href="http://192.168.209.8/Estagio/Contactos/">Contactos</a> <a target="_blank" href="http://www.parsis.pt/"><span class="tag">ParSis</span></a></h5>
			</div>
			<nav id="nav">
				<ul>
					<li><a href="homeAdmin">Página Administrador</a></li>
					<li><a href="home">Página Utilizador</a></li>
					<?php echo $editaLINK;?>
					<script>
						if (navigator.userAgent.indexOf("Chrome") > 0) 
							{
								document.write('<li class="active"><a target="_blank" href="https://chrome.google.com/webstore/detail/noojee-click-for-asterisk/neaigllemckgddgdbiipcmnpioehkcom?hl=en">Plugin</a></li>');
							} else 
							{
								document.write('<li class="active"><a target="_blank" href="https://addons.mozilla.org/en-US/firefox/addon/noojee-click-for-asterisk/">Plugin</a></li>');
							}
					</script>
					<li><a href="php/logout">Logout</a></li>
				</ul>
			</nav>
		</div>