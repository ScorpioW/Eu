<?php 
    include("php/headerUtil.php"); 
	include("php/DB.php");
	if (isset($_SESSION['sess_type']))
	{
		$pr = $_SESSION['sess_type'] == 1;
	}
	if (isset($_SESSION['user'])) 
	{
		$sess = $_SESSION['user'];
		if (!$pr == 1) 
		{
			header('location: home');
		} else 
		{
			header('location: homeAdmin');
		}
	}
?>
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Login</h2>
				
			</header>
			<form action="" method="post" autocomplete="off">

				Username: <input type="text" name="user" id="textbox" placeholder="Username..." class="textbox"><br><br>
				Password: <input type="password" name="pass" id="textbox" placeholder="Password..." class="textbox"><br><br>
				<input id="login" type="submit" name="submit" value="Entrar">
				
				<?php include("php/login.php") ?>

			</form>
		</section>
	</div>
</div>
</div>
	<?php include("php/footer.php"); ?>
