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


	$idEmpSelect = "";
	$idEmpFrom = "";
	$idEmpWhere = "";
	if ($isEmp == 0)
	{	
		$idEmpSelect = ", pessoas.id_empresa";
		$idEmpFrom = ", pessoas";
		$idEmpWhere = "AND Contacto.id = pessoas.id_contacto";
	}

	$lista="SELECT Contacto.nome, morada, codP, area, Localidade, telefone, telefone2, email, email2".$idEmpSelect."
				FROM Contacto, Telefone, Email".$idEmpFrom."
				WHERE Contacto.id = Telefone.id_contacto 
				AND Contacto.id = Email.id_contacto 
				".$idEmpWhere."
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
						<input type='text' name='nomeEmpresa' class='textbox' value='".$getEmp."'><br>";
					} 

					if ($registos['codP'] == 0 && $registos['area'] == 0)
					{
						$registos['codP'] = ""; 
						$registos['area'] = "";
					}
				?>
				Nome: <font size="2" color="red">&nbsp;*</font><br>
				<input type="text" name="nome" size="10" value='<?php echo $registos['nome'];?>'>
				<br>Morada: 
				<input type="text" size="20" name="morada" value='<?php echo $registos['morada'];?>'>
				<br>Codigo Postal:
				<input type="numeric" name="codP" size="3" value='<?php echo $registos['codP'];?>'>
				- <input type="numeric" size="2" name="area" value='<?php echo $registos['area'];?>'><br>
				<br>Localidade:
				<input type="text" size="9" name="localidade" value='<?php echo $registos['Localidade'];?>'>
				<br>Telefone: <font size="2" color="red">*</font>
				<input type="telefone" name="telefone" class="textbox" value='<?php echo $registos['telefone'];?>'>&nbsp; &nbsp; 
				Telefone 2: 
				<input type="telefone" name="telefone2" class="textbox" value="<?php echo $registos['telefone2'];?>"><br>
				<br>Email:
				<input type="email" name="email" value='<?php echo $registos['email'];?>'>
				<br>Email 2: 
				<input type="email" name="email2" class="textbox" value="<?php echo $registos["email2"];?>"><br>
				<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
				<br><input type="submit" value="Actualizar"> &nbsp; &nbsp; &nbsp; &nbsp;
				<a href="editacont.php"><input type="button" value="Voltar"></a>
			</form>
		</section>	
	</div>
</div>
<?php include("php/footer.php"); ?>