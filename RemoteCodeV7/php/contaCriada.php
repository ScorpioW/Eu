
<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php include("php/header.php"); ?>		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Login</h2>
				
			</header>
			<form action="" method="post">

				Username: <input type="text" name="user" id="user" placeholder="Username..." style="border: 1px solid grey"><br><br>
				Password: <input type="Password" name="pass" id="pass" placeholder="Password..." style="border: 1px solid grey"><br><br>
				<input id="login" type="submit" name="submit" value="Entrar">
				
				<?php include("php/login.php") ?>

			</form>
		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php"); ?>
	</body>
</html>