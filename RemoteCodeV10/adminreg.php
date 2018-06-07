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
	            Username: <font size="2" color="red">&nbsp;*</font> <input type="text" name="login" placeholder="Username..." class="textbox"><br>
	            Password: <font size="2" color="red">&nbsp;*</font> <input type="password" name="pass1" placeholder="Password..." class="textbox"><br>
				Confirmar Password: <font size="2" color="red">&nbsp;*</font> <input type="password" name="pass2" placeholder="Confirme Password..." class="textbox"><br>
				Empresa: <input type="text" name="empresa" placeholder="Ex.: Parsis" class="textbox"><br>
				Localidade: <input type="text" name="localidade" class="textbox" placeholder="Ex.: Lisboa"><br>
				Morada: <input type="text" name="morada" class="texbox" placeholder="Ex.: Rua ABC nº123"><br>
				Codigo Postal <input type="numeric" name="codP" size="3" placeholder="Ex.: 9999">
				- <input type="numeric" size="2" name="area" placeholder="Ex.: 999"><br><br>
				Localidade da Empresa: <input type="text" name="local" placeholder="Ex.: Belém"><br>
				Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
				Email secundário: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
				Telefone: <font size="2" color="red">&nbsp;*</font> <input type="telefone" name="tel" id="telMask[1]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
				Telefone secundário: <input type="telefone" name="tel2"id="telMask[2]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
				Extensão: <input type="numeric" size="2" name="ext" placeholder="Ex.: 999"><br><br>
				Privilégios: <font size="2" color="red">&nbsp;*</font> &nbsp;&nbsp;&nbsp;


				<input type="radio" name="priv" value="Admin"> Administrador &nbsp; &nbsp; 
				<input type="radio" name="priv" value="User" checked="true"> Utilizador <br><br>

				<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
	            <input type="submit" name="submit" value="Registar">
				<input type="reset" value="Limpar">
				<a href="homeAdmin.php"><input type="button" name="voltar" value="Voltar"></a>
	            <?php include("php/reguser.php"); ?>
        	</form>
		</section>
	</div>
</div>
</div>]
	<?php include("php/footer.php") ?>

<script>
	function mask(id)
	{
		document.getElementById(id).addEventListener('input', function (e) {
			var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})/);
			e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
			});
	}
	var x = mask('telMask[1]');
	var x = mask('telMask[2]');
</script>