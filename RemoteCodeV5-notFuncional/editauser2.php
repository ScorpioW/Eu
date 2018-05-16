<?php  
include("php/DB.php");
include("php/header.php"); 
$id=$_GET['id'];
$faz_editar=mysqli_query($link,"Select * from Users where id='$id'");
$registos=mysqli_fetch_array($faz_editar);?>

<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Editar Users</h2>
			</header>
			<form action="php/atualiza.php?id=<?php echo $id;?>" method="POST">
			Login:
			<input type="text" name="login" value='<?php echo $registos['login'];?>'>
			<br>Pass:
			<input type="text" name="pass" size="2" value='<?php echo $registos['pass'];?>'>
			<br>id_contacto
			<input type="text" name="id_contacto" size="2" value='<?php echo $registos['id_contacto'];?>'>
			<br>direitos
			<input type="text" name="direitos" size="2" value='<?php echo $registos['direitos'];?>'>
			
			<br><input type="submit" value="Actualizar"> <input type="button" value="Voltar" onclick="window.location.href='homeAdmin.php'"">
		</section>		
	</div>
<!-- /Page -->
</div>
	<?php include("php/footer.php"); ?>