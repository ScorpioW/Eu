<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validar.php");
?>

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
				<h2>Dados do Utilizador</h2>
				
			</header>
    		<form action="" method="post">
	            Login: <input type="text" name="login" placeholder="Login" class="textbox"><br>
	            Password:<input type="password" name="pass1" placeholder="Password" class="textbox"><br>
	            Confirmar Password :<input type="password" name="pass2" placeholder="Confirme Password" class="textbox"><br>
	            Id do contacto :<input type="text" name="idcont" class="textbox"><br>
	            <select name="direitos">
				  <option value="Admin">Admin (cria e altera contactos)</option>
				  <option value="User">User (lê dados)</option>
				</select>
	            <input type="submit" name="submit" value="Registar">
	            <input type="reset" value="Limpar">
	            <?php include("php/reguser.php"); ?>
        	</form>
		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php"); ?>
	</body>
</html>
