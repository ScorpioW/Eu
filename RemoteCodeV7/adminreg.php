<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>	
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Dados do Utilizador</h2>
			</header>
    		<form action="" method="post" autocomplete="off" name="mform">
	            Username: <input type="text" name="login" placeholder="Username..." class="textbox"><br>
	            Password:<input type="password" name="pass1" placeholder="Password..." class="textbox"><br>
				Confirmar Password: <input type="password" name="pass2" placeholder="Confirme Password..." class="textbox"><br>
				Empresa: <input type="text" name="empresa" placeholder="Ex.: Parsis" class="textbox"><br>
				Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
				Email 2: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
				Telefone: <input type="telefone" name="tel" placeholder="Ex.: 999-999-999" class="textbox">&nbsp; &nbsp; 
				Telefone 2: <input type="telefone" name="tel2" placeholder="Ex.: 999-999-999" class="textbox"><br><br>
				Localidade: <input type="text" name="localidade" class="textbox" placeholder="Ex.: Lisboa"><br>
				Morada: <input type="text" name="morada" class="texbox" placeholder="Ex.: Rua ABC nº123"><br>
				Codigo Postal <input type="numeric" name="codP" size="3" placeholder="Ex.: 9999">
				- <input type="numeric" size="2" name="area" placeholder="Ex.: 999"><br><br>
				Privilégios:&nbsp;&nbsp;&nbsp; 
				<input type="radio" name="priv" value="Admin"> Administrador &nbsp; &nbsp; 
				<input type="radio" name="priv" value="User" checked="true"> Utilizador <br><br>
	            <input type="submit" name="submit" value="Registar">
	            <input type="reset" value="Limpar">
	            <?php include("php/reguser.php"); ?>
        	</form>
		</section>
	</div>
<!-- /Page -->
</div>
</div>
	<?php include("php/footer.php") ?>