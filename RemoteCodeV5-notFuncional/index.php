<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php include("php/headerUtil.php"); ?>		
<!-- Page -->
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
<!-- /Page -->
</div>
</div>
	<?php include("php/footer.php"); ?>
	</body>
</html>
