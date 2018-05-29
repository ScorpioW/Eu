<?php  
include("php/DB.php");
header('Content-Type: text/html; charset=UTF-8');
include("php/validarAdmin.php");
$searchName = "";
?>
<!-- Page -->
	<div id="page" class="container">
	<form action="" method="POST" autocomplete="off">
		<h1>Pesquisa de Registos</h1><br>
		<input type="text" name="search" placeholder="Pesquise por Nome..." class="textbox"><br>
		<input type="submit" name="submit" value="Pesquisar">
		<a href="homeAdmin.php"><input type="button" name="voltar" value="Voltar"></a>
	</form>
		<section>
			<?php  
				if (isset($_POST['submit'])) 
				{
					if (strlen($_POST['search']) >= 1)
					{
						if (preg_match('/[a-zA-Z0-9_]+/', $_POST['search']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['search'])) 
						{
							$searchName = "WHERE login LIKE '%".$_POST['search']."%'";
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
						$searchName";

				$faz_procura=mysqli_query($link,$procura);
				$num_registos=mysqli_num_rows($faz_procura);
				if ($num_registos == 0)
				{
					echo "<br><p id='err'>Nao existe registos!</p>";
					exit;
				}
				else
				{
					echo '<br>Nº Total de registos '.$num_registos;
				}?>
			<table class="default" id="pequeno">
				<tr><th>Editar<th>Apagar<th>Login<th>Direitos
					<?php
					for ($i=0;$i<$num_registos;$i++)
					{
						$registos=mysqli_fetch_array($faz_procura);

						$procuraIdSTR = "SELECT id FROM Contacto
										  WHERE id = ".$registos['id_contacto'].""; 
						$idQ = mysqli_query($link, $procuraIdSTR);
						if (!$idQ) {
							printf("Error: %s\n", mysqli_error($link));
							exit();
						}
						$id = mysqli_fetch_array($idQ)['id'];
						echo '<tr>';
						echo '<td> <a href="editauser2.php?id='.$id.'">Editar</a></td>';
						echo '<td> <a href="apagaruser.php?id='.$id.'">Apagar</a></td>';
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