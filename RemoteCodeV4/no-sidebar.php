<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php include("php/header.php") ?>		
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Login</h2>
				
			</header>
			<h2>Dados do Utilizador</h2><br>
    		<form action="" method="post">
            
	            Login: <input type="text" name="login"><br>
	            Password:<input type="text" name="pass1"><br>
	            Password 2 :<input type="text" name="pass2"><br>
	            Id do seu contacto :<input type="text" name="idcont"><br>
	            Direitos :<input type="text" name="direitos"><br>
	            <input type="submit" value="Registar">
	            <input type="reset" value="Limpar">
	            <?php include("reguser.php"); ?>
        	</form>
		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php") ?>
	</body>
</html>
