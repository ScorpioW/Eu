<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>

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
				<h2>Dados do Utilizador</h2>
				
			</header>
    		<form action="" method="post">
	            Username: <input type="text" name="login" placeholder="Username..." class="textbox"><br>
	            Password:<input type="password" name="pass1" placeholder="Password..." class="textbox"><br>
	            Confirmar Password :<input type="password" name="pass2" placeholder="Confirme Password..." class="textbox"><br>
	            Id do contacto :<input type="text" name="idcont" placeholder="ID do Contacto..." class="textbox"><br>
				Privilégios:&nbsp;&nbsp;&nbsp; 
				<input type="radio" name="priv" id="priv" value="0"> Administrador &nbsp; &nbsp; 
				<input type="radio" name="priv" id="priv" value="1" checked="true"> Utilizador <br><br>
	            <input type="submit" name="submit" value="Registar">
	            <input type="reset" value="Limpar">
	            <?php include("php/reguser.php"); ?>
        	</form>
		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php") ?>
	</body>
</html>
