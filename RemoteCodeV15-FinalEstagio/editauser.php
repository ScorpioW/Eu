<?php  
include("php/DB.php");
include("php/validarAdmin.php");
$searchName = "";
?>
<div id="page" class="container">
<section>
	<header class="major">
		<h2>Pesquisa de Registos</h2>
	</header>
<form action="" method="POST" autocomplete="off">
	<input type="text" name="search" placeholder="Pesquise por Nome..." class="textbox"><br>
	<input type="submit" name="submit" value="Pesquisar">
	<a href="homeAdmin"><input type="button" name="voltar" value="Voltar"></a>
</form>
		<?php  
			if (isset($_POST['submit'])) 
			{
				if (strlen($_POST['search']) >= 1)
				{
					if (preg_match('/[a-zA-Z0-9_]+/', $_POST['search']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['search'])) 
					{
						$searchName = "AND login LIKE '%".$_POST['search']."%'";
					}
					else
					{
						echo '<p id="err">Nome Inválido</p>';
						exit;
					}	
				}
			}
			$procura="SELECT id, login, direitos, id_contacto 
					FROM Users
					WHERE direitos <> 'Admin'
					$searchName";
			$faz_procura=mysqli_query($link,$procura) or die(mysqli_error($link));
			$num_registos=mysqli_num_rows($faz_procura);
			if ($num_registos == 0)
			{
				echo "<br><p id='err'>Nao existe registos!</p>";
				exit;
			}
			else
			{}?>
		<br>
		<table class="default" id="pequeno">
			<tr><th>Editar<th>Apagar<th>Login<th>Direitos
				<?php
				for ($i=0;$i<$num_registos;$i++)
				{
					$registos=mysqli_fetch_array($faz_procura);

					$procuraIdSTR = "SELECT id FROM Contacto
										WHERE id = ".$registos['id_contacto'].""; 
					$idQ = mysqli_query($link, $procuraIdSTR) or die(mysqli_error($link));
					if (!$idQ) {
						printf("Error: %s\n", mysqli_error($link));
						exit();
					}
					$id = mysqli_fetch_array($idQ)['id'];
					echo '<tr>';
					echo '<td> <a href="editauser2?id='.$id.'"><b>Editar</b></a></td>';
					echo '<td> <a href="apagaruser?id='.$id.'"><b>Apagar</b></a></td>';
					echo '<td>'.$registos["login"]. '</td>';
					echo '<td>'.$registos["direitos"]. '</td>';
					echo '<tr>';
				}
			?>
		</table>
		<br>
	</section>
</div>
</div>
<?php include("php/footer.php");?>