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
			<h2>Dados do Contacto da Pessoa</h2>
		</header>
		<form action="" method="post" autocomplete="off">
			Nome: <font size="2" color="red">&nbsp;*</font> <input type="text" name="nome"  class="textbox" placeholder="Nome..."><br>
			Morada: <input type="text" name="morada" class="textbox" placeholder="Ex.: Rua ABC nº123"><br>
			<input type="text" name="emp" id="emp" value="Nenhuma" hidden="true">
			Codigo Postal: &nbsp; 
			<input type="numeric" name="codP" id="Cod" size="3" placeholder="Ex.: 9999">
			- <input type="numeric" size="2" name="area" id="Area" placeholder="Ex.: 999"><br><br>
			Localidade :<input type="text" name="localidade"  class="textbox" placeholder="Ex.: Lisboa"><br>
			Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
			Email Secundário: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
			Telefone:<font size="2" color="red">&nbsp;*</font> <input type="telefone" name="tel" id="telMask[1]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
			Telefone Secundário: <input type="telefone" name="tel2" id="telMask[2]" placeholder="Ex.: 999 999 999" class="textbox">&nbsp;&nbsp;<br><br>
			Empresa: <div class="dropdown">
						<button type="button" name="empresa" id="selectbtn" onclick="dropClick()" class="dropbtn">Nenhuma</button>
						<div id="myDropdown" class="dropdown-content">
							<p onclick="mudarEmp('Nenhuma')" class="select">Nenhuma</p>
							<?php
								$empSTR = "SELECT nome FROM empresa";
								$empQ = mysqli_query($link, $empSTR) or die(mysqli_error($link));
								$emp = array();
								$i = 0;
								if (mysqli_num_rows($empQ))
								{
									while($empA = mysqli_fetch_array($empQ)) 
									{
										$emp[$i] = $empA[0];
										$i++;
									}
									foreach ($emp as $empresa => $nome) 
									{
										echo '<p onclick="mudarEmp(\''.$nome.'\')" class="select">'.$nome.'</p>';
									}
								}
							?>
						</div>
					</div><br><br>
			Localidade da Empresa: <input type="text" name="local" disabled="true" id="Loc" placeholder="Ex.: Belém"><br>
			Extensão: <input type="numeric" size="2" name="ext" disabled="true" id="Ext" placeholder="Ex.: 60"><br><br>
			<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
			<input type="submit" name="submit" value="Registar">
			<a href="criacontacto"><input type="button" name="voltar" value="Voltar"></a>
			<?php include("php/contpessoa2.php");?>
		</form>
	</section>
</div>
</div>
</div>
<?php include("php/footer.php") ;?>
<script>
	$(function(){init_mask()});
</script>