<?php
	include("php/DB.php");
    include("php/validarAdmin.php");
?>
<div id="page" class="container">
	<section>
		<header class="major">
			<h2>Dados do Utilizador</h2>
		</header>
		<form action="" method="post" autocomplete="off" name="mform">
			Username: <font size="2" color="red">&nbsp;*</font> <input type="text" name="login" placeholder="Username..." class="textbox"><br>
			Password: <font size="2" color="red">&nbsp;*</font> <input type="password" name="pass1" placeholder="Password..." class="textbox"><br>
			Confirmar Password: <font size="2" color="red">&nbsp;*</font> <input type="password" name="pass2" placeholder="Confirme Password..." class="textbox"><br>
			<input type="text" name="emp" id="emp" value="Nenhuma" hidden="true">
			Localidade: <input type="text" name="localidade" class="textbox" placeholder="Ex.: Lisboa"><br>
			Morada: <input type="text" name="morada" class="texbox" placeholder="Ex.: Rua ABC nº123"><br>
			Codigo Postal <input type="numeric" name="codP" id="Cod" size="3" placeholder="Ex.: 9999">
			- <input type="numeric" size="2" name="area" id="Area" placeholder="Ex.: 999"><br><br>
			Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
			Email secundário: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
			Telefone: <font size="2" color="red">&nbsp;*</font> <input type="telefone" name="tel" id="telMask[1]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
			Telefone secundário: <input type="telefone" name="tel2"id="telMask[2]" placeholder="Ex.: 999 999 999" class="textbox"><br><br>
			Empresa: <div class="dropdown">
						<button type="button" name="empresa" id="selectbtn" onclick="dropClick()" class="dropbtn">Nenhuma</button>
						<div id="myDropdown" class="dropdown-content">
							<p onclick="mudarEmp('Nenhuma')" class="select">Nenhuma</p>
							<?php
								$empSTR = "SELECT nome FROM empresa
											ORDER BY nome ASC";
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
			Localidade da Empresa: <input type="text" name="local" id="Loc" placeholder="Ex.: Belém" disabled="true"><br>
			Extensão: <input type="numeric" size="2" name="ext" id="Ext" placeholder="Ex.: 999" disabled="true"><br><br>
			Privilégios: <font size="2" color="red">&nbsp;*</font> &nbsp;&nbsp;&nbsp;
			<input type="radio" name="priv" value="Admin"> Administrador &nbsp; &nbsp; 
			<input type="radio" name="priv" value="User" checked="true"> Utilizador <br><br>
			<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
			<input type="submit" name="submit" value="Registar">
			<input type="reset" value="Limpar">
			<a href="homeAdmin"><input type="button" name="voltar" value="Voltar"></a>
			<?php include("php/reguser.php");?>
		</form>
	</section>
</div>
</div>
</div>
	<?php include("php/footer.php") ?>

<script>
	function mask(id)
	{
		document.getElementById(id).addEventListener('input', function (e) {
			var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})/);
			e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
			});
	}

	function maskCP(idC, idA, ext)
	{
		document.getElementById(idC).addEventListener('input', function (e) {
			var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})/);
			e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
			});

		document.getElementById(ext).addEventListener('input', function (e) {
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
	var x = maskCP('Cod', 'Area', 'Ext');

	function dropClick() {
		document.getElementById("myDropdown").classList.toggle("show");
	}

	window.onclick = function(event) {
		if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				}
			}
		}
	}

	function mudarEmp(empresa)
	{
		var dropDown = document.getElementById("selectbtn");
		var emp = document.getElementById("emp");
		dropDown.innerHTML = empresa;
		emp.value = empresa;

		if (emp.value == "Nenhuma")
		{
			document.getElementById("Ext").disabled = true;
			document.getElementById("Loc").disabled = true;
		} else
		{
			document.getElementById("Ext").disabled = false;
			document.getElementById("Loc").disabled = false;
		}
	}
</script>