<?php  
$id=$_GET['id'];
$nome=$_POST['login'];
$direitos=$_POST['direitos'];
include("php/DB.php");
include("php/validarAdmin.php");
if (isset($_SERVER['HTTP_REFERER'])) {
    	$ref_url = $_SERVER['HTTP_REFERER'];
    }else{
		$ref_url = 'No referrer set';
	}
	if (strpos($ref_url, 'editauser2') != True) 
	{
		header("location: paginareservada");
	}
?>
<div id="page" class="container">
		<section>			
		<h2>Atualizar Dados</h2>
		<?php if (preg_match('/[a-zA-Z0-9_]+/', $nome) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $nome) && strlen($nome) >= 4) 
		{
			$faz_actualizar=mysqli_query($link, "Update Users SET login='".$nome."',direitos='".$direitos."' WHERE id_contacto='".$id."'") or die(mysqli_error($link));
			$faz_actualizar=mysqli_query($link, "Update Contacto SET nome='".$nome."' WHERE id ='".$id."'") or die(mysqli_error($link));
			$faz_actualizar=mysqli_query($link, "Update pessoas SET nome='".$nome."' WHERE id_contacto ='".$id."'") or die(mysqli_error($link));
			if ($_SESSION['user']['idCont'] == $id)
			{
				$_SESSION['user']['login'] = $nome;
				if ($direitos == 'Admin')
				{
					$dir = 1;
				} else
				{
					$dir = 2;
				}
				$_SESSION['sess_type'] = $dir;
			}
			echo '<br><p id="sucess">Dados Alterados com sucesso!</p>';
		} else
		{
			echo '<br><p id="err">Username Inválido!</p>';
		}?>
		<br>
			<form action="editauser">
				<input type="submit" value="Voltar">
			</form>
		</section>
	</div>
</div>
<?php include("php/footer.php"); ?>