<?php  
    if (isset($_SERVER['HTTP_REFERER'])) {
    	$ref_url = $_SERVER['HTTP_REFERER'];
    }else{
		$ref_url = 'No referrer set';
	}
	if (strpos($ref_url, 'editacont.php') != True) 
	{
		header("location: paginareservada.php");
	}
	include("php/DB.php");
	include("php/validarAdmin.php"); 
	$id=$_GET['id'];

	$lista = "SELECT isEmpresa FROM Contacto
			 WHERE id = $id";

	$getIsEmpQ = mysqli_query($link, $lista);
	$isEmp = mysqli_fetch_array($getIsEmpQ)[0];


	$idEmpQ = array('select' => "", 'from' => "", 'where' => "");
	$extQ = array('select' => "", 'from' => "", 'where' => "");
	$ext = "";
	$loc = "";
	if ($isEmp == 0)
	{	
		$idEmpQ['select'] = ", pessoas.id_empresa";
		$idEmpQ['from'] = ", pessoas";
		$idEmpQ['where'] = "AND Contacto.id = pessoas.id_contacto";
		$extQ['select'] = ", extensao, local";
		$extQ['from'] = ", Interno";
		$extQ['where'] = "AND Contacto.id = Interno.id_contacto";
	}

	$lista="SELECT Contacto.nome, morada, codP, area, Localidade, telefone, telefone2, email, email2".$idEmpQ['select'].$extQ['select']."
				FROM Contacto, Telefone, Email".$idEmpQ['from'].$extQ['from']."
				WHERE Contacto.id = Telefone.id_contacto 
				AND Contacto.id = Email.id_contacto
				".$idEmpQ['where']."
				".$extQ['where']."
				AND Contacto.id = $id";
	$faz_editar=mysqli_query($link, $lista);
	if (!$faz_editar) {
		printf("Error: %s\n", mysqli_error($link));
		exit();
	}
	$registos=mysqli_fetch_array($faz_editar);
	if ($isEmp == 0)
	{
		$empID = $registos["id_empresa"];
		$ext = 'Extensão: <input type="numeric" size="2" name="ext" placeholder="Ex.: 999" value="'.$registos["extensao"].'"><br>';
		$loc = 'Localidade da Empresa: <input type="text" name="local" placeholder="Ex.: Belém" value="'.$registos["local"].'"><br>';
	}
	if ($isEmp == 0 && $empID > 0) 
	{
		$getEmpSTR = "SELECT nome FROM empresa
					  Where id = $empID";
		$getEmpQ = mysqli_query($link, $getEmpSTR);
		$getEmp = mysqli_fetch_array($getEmpQ)[0];
	} else 
	{
		$getEmp = "";
	}
?>		

	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Contactos</h2>
			</header>
			<form action="atualizacont.php?id=<?php echo $id;?>" method="POST" autocomplete="off">
				<?php
					if ($isEmp == 0) 
					{
						echo "Nome Empresa: 
						<input type='text' name='nomeEmpresa' placeholder='Ex.: ParSis' class='textbox' value='".$getEmp."'><br>";
					} 

					$tel = wordwrap($registos['telefone'] , 3 , ' ' , true );
					$tel2 = wordwrap($registos['telefone2'] , 3 , ' ' , true );

					if ($registos['codP'] == 0 && $registos['area'] == 0)
					{
						$registos['codP'] = ""; 
						$registos['area'] = "";
					}
				?>
				Nome: <font size="2" color="red">&nbsp;*</font>
				<input type="text" name="nome" size="10" placeholder="Nome..." value='<?php echo $registos['nome'];?>'><br>
				Morada: 
				<input type="text" size="20" name="morada" placeholder="Ex.: Rua ABC nº123" value='<?php echo $registos['morada'];?>'><br>
				Codigo Postal:
				<input type="numeric" name="codP" size="3" placeholder="Ex.: 9999" value='<?php echo $registos['codP'];?>'>
				- <input type="numeric" size="2" name="area" placeholder="Ex.: 999" value='<?php echo $registos['area'];?>'><br><br>
				Localidade:
				<input  type="text" name="localidade" placeholder="Ex.: Lisboa" value='<?php echo $registos['Localidade'];?>'><br>
				<?php echo($loc);?>
				Email:
				<input type="email" name="email" placeholder="Exemplo@Exemplo.com" value="<?php echo $registos["email"];?>"><br>
				Email Secundário: 
				<input type="email" name="email2" placeholder="Exemplo@Exemplo.com" class="textbox" value="<?php echo $registos["email2"];?>"><br>
				Telefone: <font size="2" color="red">*</font>
				<input type="telefone" name="telefone" class="textbox" id="telMask[1]" placeholder="Ex.: 999999999" value="<?php echo $tel?>"><br><br>
				Telefone Secundário: 
				<input type="telefone" name="telefone2" class="textbox" id="telMask[2]" placeholder="Ex.: 999999999" value="<?php echo $tel2;?>"><br><br>
				<?php echo($ext);?><br>
				<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
				<input type="submit" value="Actualizar"> &nbsp; &nbsp; &nbsp; &nbsp;
				<a href="editacont.php"><input type="button" value="Voltar"></a>
			</form>
		</section>	
	</div>
</div>
<?php include("php/footer.php"); ?>
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