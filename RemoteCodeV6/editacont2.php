<?php  
	include("php/DB.php");
	include("php/validarAdmin.php"); 
	$id=$_GET['id'];
	$lista="SELECT isEmpresa, nome, morada, codP, area, Localidade, telefone, email
				FROM Contacto, Telefone, Email
				WHERE Contacto.id = Telefone.id_contacto 
				AND Contacto.id = Email.id_contacto 
				AND Contacto.id = $id";
	$faz_editar=mysqli_query($link, $lista);
	$registos=mysqli_fetch_array($faz_editar);
?>		

	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Contactos</h2>
			</header>
			<form action="atualizacont.php?id=<?php echo $id;?>" method="POST" autocomplete="off">
				<input type="checkbox" name="emp" id="emp"/>
				<label for="emp">Empresa</label><br><br>
				<font id="lbl">Nome Empresa</font><br>
				<input type="text" nome="nomeEmpresa" id="lblInp" size="10"><br>
				Nome:
				<input type="text" name="nome" size="10" value='<?php echo $registos['nome'];?>'>
				<br>Morada:
				<input type="text" size="20" name="morada" value='<?php echo $registos['morada'];?>'>
				<br>Codigo Postal
				<input type="numeric" name="codP" size="3" value='<?php echo $registos['codP'];?>'>
				- <input type="numeric" size="2" name="area" value='<?php echo $registos['area'];?>'><br>
				<br>Localidade
				<input type="text" size="9" name="localidade" value='<?php echo $registos['Localidade'];?>'>
				<br>Telefone
				<input type="text" name="telefone" size="9" value='<?php echo $registos['telefone'];?>'>
				<br>Email
				<input type="text" name="email" value='<?php echo $registos['email'];?>'>
				<br><input type="submit" value="Actualizar"><br>
			</form>	
		</section>	
	</div>
</div>
<?php include("php/footer.php"); ?>