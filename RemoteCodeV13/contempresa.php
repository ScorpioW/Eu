<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>	
		<div id="page" class="container">
			<section>
				<header class="major">
					<h2>Dados do Contacto da empresa</h2>
					
				</header>
				<form action="" method="post" autocomplete="off">
					Nome: <font size="2" color="red">&nbsp;*</font> <input type="text" name="nome"  class="textbox" placeholder="Nome da Empresa..."><br>
					Morada: <input type="text" name="morada" class="textbox" placeholder="Ex.: Rua ABC nº123"><br>
					Codigo Postal: 
					<input type="numeric" name="codP" id="Cod" size="3" placeholder="Ex.: 9999">
					- <input type="numeric" size="2" name="area" id="Area" placeholder="Ex.: 999"><br><br>
					Localidade :<input type="text" name="localidade" class="textbox" placeholder="Ex.: Lisboa"><br>
					Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
					Email secundário: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
					Telefone: <font size="2" color="red">&nbsp;*</font> <input type="telefone" name="tel" id="telMask[1]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
					Telefone secundário: <input type="telefone" name="tel2" id="telMask[2]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
					<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
					<input type="submit" name="submit" value="Registar">
					<input type="reset" value="Limpar">
					<a href="criacontacto"><input type="button" name="voltar" value="Voltar"></a>
				</form>
			</section>
			<?php include("php/contempresa2.php"); ?>
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

	function maskCP(idC, idA)
	{
		document.getElementById(idC).addEventListener('input', function (e) {
			var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})/);
			e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
			});
		document.getElementById(idA).addEventListener('input', function (e) {
			var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})/);
			e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
			});
	}

	var x = mask('telMask[1]');
	var x = mask('telMask[2]');
	var x = maskCP('Cod', 'Area');
</script>