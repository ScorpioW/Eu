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
			<form action="" method="post">

				Username: <input type="text" name="user" id="user" placeholder="Username..." style="border: 1px solid black"><br><br>
				Password: <input type="Password" name="pass" id="pass" style="border: 1px solid black" placeholder="Password..."><br><br>
				<input type="submit" name="submit" value="Entrar">
				<?php
					if (isset($_POST['submit']))
					{
						header('Content-Type: text/html; charset=UTF-8');
						include("DB.php");
						$password=$_POST["pass"];
						$user=$_POST["user"];
						$login= mysqli_query($link, "SELECT * FROM Users where login='$user' AND pass='$password'");
						if (strlen($password)< 1)
						{
							echo 'Não digitou a password';
						}
						elseif (mysqli_num_rows($login)>0 )
						 {
							$registos=mysqli_fetch_array($login); //coloca o registo na variável
							session_start();
							$nome = utf8_encode($registos["login"]);
							
							$_SESSION["nome"]=$nome; //Cria a sessão com o conteúdo da coluna nome
							header("location: index.html");
						}
						else 
						{
							echo("");
						}
					}
				?>

			</form>
		</section>
	</div>
<!-- /Page -->

</div>
	<?php include("php/footer.php") ?>
	</body>
</html>
