<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>	
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Dados do Contacto da Pessoa</h2>
			</header>
    		<form action="" method="post" autocomplete="off">
	            Nome: <font size="2" color="red">&nbsp;*</font> <input type="text" name="nome"  class="textbox" placeholder="Nome..."><br>
                Morada: <input type="text" name="morada"  class="textbox" placeholder="Ex.: Rua ABC nº123"><br>
                Empresa: <input type="text" name="empresa" class="textbox" placeholder="Ex.: Parsis"><br>
				Codigo Postal: &nbsp; 
				<input type="numeric" name="codP" size="3" placeholder="Ex.: 9999">
			   - <input type="numeric" size="2" name="area" placeholder="Ex.: 999"><br><br>
				Localidade :<input type="text" name="localidade"  class="textbox" placeholder="Ex.: Lisboa"><br>
				Localidade da Empresa: <input type="text" name="local" placeholder="Ex.: Belém"><br>
	            Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
				Email Secundário: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
	            Telefone:<font size="2" color="red">&nbsp;*</font> <input type="telefone" name="tel" id="telMask[1]" placeholder="Ex.: 999999999" class="textbox"><br><br>
				Telefone Secundário: <input type="telefone" name="tel2" id="telMask[2]" placeholder="Ex.: 999999999" class="textbox">&nbsp;&nbsp;<br><br>
				Extensão: <input type="numeric" size="2" name="ext" placeholder="Ex.: 60"><br><br>
                <font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
	            <input type="submit" name="submit" value="Registar">
				<input type="reset" value="Limpar">
				<a href="criacontacto.php"><input type="button" name="voltar" value="Voltar"></a>
        		<?php include("php/contpessoa2.php"); ?>
            </form>
        </section>
    </div>
</div>
</div>
	<?php include("php/footer.php") ;?>
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