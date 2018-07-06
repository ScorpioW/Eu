<?php
    include("php/DB.php");
	include("php/validar.php");
	if ($_SESSION['user']['sess_type'] == 4)
	{
		header("location: paginareservada");
	}
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
					<input type="numeric" size="2" name="ext" id="Ext" placeholder="Ex.: 999" style="display: none;">
					Localidade :<input type="text" name="localidade" class="textbox" placeholder="Ex.: Lisboa"><br>
					Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
					Email secundário: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
					Telefone: <font size="2" color="red">&nbsp;*</font> <input type="telefone" name="tel" id="telMask[1]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
					Telefone secundário: <input type="telefone" name="tel2" id="telMask[2]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
					<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
					<input type="submit" name="submit" value="Registar">
					<a href="criacontacto"><input type="button" name="voltar" value="Voltar"></a>
				</form>
			</section>
			<?php include("php/contempresa2.php"); ?>
		</div>
	</div>
</div>
	<?php include("php/footer.php") ;?>
<script>
	$(function(){init_mask()});
</script>