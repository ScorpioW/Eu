<?php
if (isset($_SERVER['HTTP_REFERER'])) {
	$ref_url = $_SERVER['HTTP_REFERER'];
}else{
	$ref_url = 'No referrer set';
}
if (strpos($ref_url, 'editauser') != True) 
{
	header("location: paginareservada");
}
include("php/DB.php");
include("php/validarAdmin.php"); 
$id=$_GET['id'];
$faz_editar=mysqli_query($link,"SELECT id, login, direitos, id_contacto FROM Users WHERE id_contacto='$id'") or die(mysqli_error($link));
$registos=mysqli_fetch_array($faz_editar);?>

	<div id="page" class="container">
		<section>
			<h1>Editar Users</h1><br>
			<form action="atualiza?id=<?php echo $id;?>" method="POST" autocomplete="off">
				Username:<font size="2" color="red">&nbsp;*</font>
				<input type="text" name="login" value='<?php echo $registos['login'];?>'><br>

				<input type="checkbox" name="priv[]" id="cons" value="consult" <?php echo ($registos['direitos'] =='ler')? 'checked':'' ?>/>
				<label for="cons">Consultar dados</label>
				<input type="checkbox" name="priv[]" id="ins" value="insert" onclick="priv()" <?php echo ($registos['direitos'] =='escrever')? 'checked':'' ?>/>
				<label for="ins">Inserir/Modificar dados</label>
				<input type="checkbox" name="priv[]" id="del"  value="delete" onclick="priv()" <?php echo ($registos['direitos'] =='apagar')? 'checked':'' ?>/>
				<label for="del">Apagar dados</label><br>

				<!-- <input type="checkbox" name="priv[]" id="cons" value="consult" <?php /* echo ($registos['direitos'] =='ler')? 'checked':'' */ ?> >
					<label for="cons">Consultar dados</label>
				<input type="checkbox" name="priv[]" id="ins" onclick="priv()" value="insert" <?php /* echo ($registos['direitos'] =='escrever')? 'checked':'' */ ?> >
					<label for="del">Inserir/Modificar dados</label>
				<input type="checkbox" name="priv[]"  id="del" onclick="priv()" value="delete" <?php /* echo ($registos['direitos'] =='apagar')? 'checked':'' */ ?> >
					<label for="del">Apagar dados</label><br> -->


				<font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br>
				<br><input type="submit" value="Actualizar"> <input type="button" value="Voltar" onclick="window.location.href='editauser'">
			</form>
		</section>	
	</div>
</div>
<?php include("php/footer.php"); ?>
<script>
	$(function(){priv()});
</script>