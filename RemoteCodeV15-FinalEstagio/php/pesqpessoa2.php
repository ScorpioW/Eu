<?php  
	header('Content-Type: text/html; charset=UTF-8');
	include("php/DB.php");
	$pessoa = "";
	$err = "";
?>	
<div id="page" class="container">
	<section> <?php  
		if (isset($_POST['submit']))
		{
			if (strlen($_POST['pessoa']) >= 1)
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $_POST['pessoa']) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $_POST['pessoa'])) 
				{
					$pessoa = $_POST['pessoa'];
				}
				else
				{
					echo '<p id="err">Nome Inválido!</p>';
					exit;
				}
			}
		}
		$existe="SELECT Contacto.id, nome, morada, codP, area, Localidade, telefone, telefone2, email, email2, isEmpresa
				FROM Contacto, Telefone, Email
				Where nome LIKE '%$pessoa%'
				AND Contacto.id = Telefone.id_contacto 
				AND Contacto.id = Email.id_contacto 
				AND isEmpresa = 0
				AND nome NOT LIKE '%".$_SESSION['user']['login']."%'
				ORDER BY nome ASC";
		$se_existe=mysqli_query($link, $existe) or die(mysqli_error($link));
		$num_registos=mysqli_num_rows($se_existe); 
		if ($num_registos>0){}
		else
		{
			if (empty($pessoa))
			{
				echo '<br><p id="err">Nenhum contacto foi encontrado!</p>';
				exit;
			}else
			{
				echo '<br><p id="err">'.$pessoa.' não se encontra registado(a)!</p>';
				exit;
			}
		}?>
		<table class="default" id="grande">
			<tr><th>Nome<th>Empresa<th>Telefone<th>Email<th>Localidade<th>Morada<th>Codigo Postal <?php
			for ($i=0;$i<$num_registos;$i++)
			{
				$registos=mysqli_fetch_array($se_existe);
				$tel = wordwrap($registos['telefone'] , 3 , ' ' , true );
				$tel2 = wordwrap($registos['telefone2'] , 3 , ' ' , true );
				if ($registos['codP'] == 0 && $registos['area'] == 0)
				{
					$registos['codP'] = ""; 
					$registos['area'] = "";
				}
				$empresa = "";
				if ($registos["isEmpresa"] == 0)
				{ 
					$id=utf8_encode($registos[0]);
					$pessSTR = "SELECT id_empresa FROM pessoas
								WHERE id_contacto = $id";
					$pessQ = mysqli_query($link, $pessSTR) or die(mysqli_error($link));
					$idEmp = mysqli_fetch_array($pessQ)[0];
					if (is_null($idEmp))
					{
						$empresa = '<img src="images/noChecked.png" />'; 
					} else
					{
						$qSTR = "SELECT nome FROM empresa
								 WHERE id = $idEmp";
						$empresaQ = mysqli_query($link, $qSTR) or die(mysqli_error($link));
						$empresa = mysqli_fetch_array($empresaQ)[0];
					}
				} else 
				{
					$empresa = '<img src="images/checked.png" />'; 
				}
				echo '<tr>';
				echo '<td>'.$registos["nome"]. '</td>';
				echo '<td>'.$empresa.'</td>';
				echo '<td>'.$tel. ' '.$tel2.'</td>';
				echo '<td>'.$registos["email"]. ' <br> '.$registos['email2'].'</td>';
				echo '<td>'.$registos["Localidade"]. '</td>';
				echo '<td>'.$registos["morada"]. '</td>';
				echo '<td>'.$registos["codP"]. '-'.$registos["area"]. '</td>';
				echo '</tr>';
			} ?>
		</table>
	</section>
</div>