<?php  
	if (isset($_SERVER['HTTP_REFERER'])) 
	{
    	$ref_url = $_SERVER['HTTP_REFERER'];
	}else
	{
		$ref_url = 'No referrer set';
	}
	$id=$_GET['id'];
	include("php/DB.php");
	if (strpos($ref_url, 'editacont') != True && strpos($ref_url, 'home') != True && strpos($ref_url, 'homeAdmin') != True) 
	{
		header("location: paginareservada");
	} elseif (strpos($ref_url, 'home') == True || strpos($ref_url, 'homeAdmin') == True) 
	{
		include('php/validar.php');
		if ($id != $_SESSION['user']['idCont'] && ($_SESSION['user']['sess_type'] != 1 && $_SESSION['user']['sess_type']) != 2 && $_SESSION['user']['sess_type'] != 3)
		{
			header('location: paginareservada');
		}
	} else
	{
		include("php/validar.php"); 
		if ($_SESSION['user']['sess_type'] == 4)
		{
			header("location: paginareservada");
		}
	}

	$lista = "SELECT isEmpresa FROM Contacto
			 WHERE id = $id";

	$getIsEmpQ = mysqli_query($link, $lista) or die(mysqli_error($link));
	$isEmp = mysqli_fetch_array($getIsEmpQ)[0];


	$idEmpQ = array('select' => "", 'from' => "", 'where' => "");
	$extQ = array('select' => "", 'from' => "", 'where' => "");
	$ext = '<input type="numeric" size="2" name="ext" id="Ext" placeholder="Ex.: 999" style="display: none;">';
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
	$faz_editar=mysqli_query($link, $lista) or die(mysqli_error($link));
	if (!$faz_editar) {
		printf("Error: %s\n", mysqli_error($link));
		exit();
	}
	$registos=mysqli_fetch_array($faz_editar);
	$dis = "";
	if ($isEmp == 0) 
	{
		$empID = $registos["id_empresa"];
	}
	if ($isEmp == 0 && $empID > 0) 
	{
		$getEmpSTR = "SELECT nome FROM empresa
					  Where id = $empID";
		$getEmpQ = mysqli_query($link, $getEmpSTR) or die(mysqli_error($link));
		$getEmp = mysqli_fetch_array($getEmpQ)[0];
	} else 
	{
		$getEmp = "Nenhuma";
		$dis = 'disabled = "true"';
	}
	if ($isEmp == 0)
	{
		$ext = 'Extensão: <input type="numeric" size="2" name="ext" '.$dis.' id="Ext" placeholder="Ex.: 999" value="'.$registos["extensao"].'"><br>';
		$loc = 'Localidade da Empresa: <input type="text" name="local" '.$dis.' id="Loc" placeholder="Ex.: Belém" value="'.$registos["local"].'"><br>';
	}
?>		

	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Contactos</h2>
			</header>
			<form action="atualizacont?id=<?php echo $id;?>" method="POST" autocomplete="off">
			  <?php
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
				<input type="numeric" name="codP" size="3" id="Cod" placeholder="Ex.: 9999" value='<?php echo $registos['codP'];?>'>
				- <input type="numeric" size="2" name="area" id="Area" placeholder="Ex.: 999" value='<?php echo $registos['area'];?>'><br><br>
				Localidade:
				<input  type="text" name="localidade" placeholder="Ex.: Lisboa" value='<?php echo $registos['Localidade'];?>'><br>
				Email:
				<input type="email" name="email" placeholder="Exemplo@Exemplo.com" value="<?php echo $registos["email"];?>"><br>
				Email Secundário: 
				<input type="email" name="email2" placeholder="Exemplo@Exemplo.com" class="textbox" value="<?php echo $registos["email2"];?>"><br>
				Telefone: <font size="2" color="red">*</font>
				<input type="telefone" name="telefone" class="textbox" id="telMask[1]" placeholder="Ex.: 999 999 999" value="<?php echo $tel?>"><br><br>
				Telefone Secundário: 
				<input type="telefone" name="telefone2" class="textbox" id="telMask[2]" placeholder="Ex.: 999 999 999" value="<?php echo $tel2;?>"><br><br>
				<?php
					if ($isEmp == 0) 
					{ ?>
						Empresa: <div class="dropdown">
									<button type="button" name="empresa" id="selectbtn" onclick="dropClick()" class="dropbtn"><?php echo $getEmp; ?></button>
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
					<input type="text" name="emp" id="emp" value="<?php echo $getEmp; ?>" hidden="true">
				<?php } ?>
				<?php echo($loc);?>
				<?php echo($ext);?><br>
				<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
				<input type="submit" value="Actualizar"> &nbsp; &nbsp; &nbsp; &nbsp;
				<a href="editacont"><input type="button" value="Voltar"></a>
			</form>
		</section>	
	</div>
</div>
<?php include("php/footer.php"); ?>
<script>
	$(function(){init_mask()});
</script>