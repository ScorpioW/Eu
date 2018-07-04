<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <?php 
	include("php/validarAdmin.php");
	if (isset($_SERVER['HTTP_REFERER'])) 
	{
    	$ref_url = $_SERVER['HTTP_REFERER'];
	}else
	{
		$ref_url = 'No referrer set';
	}?>
<div id="page" class="container">
    <section>
		<h2>Eliminar Contacto</h2><?php
		$id=$_GET['id'];
		include("php/DB.php");
		$isEmpSTR = 'SELECT isEmpresa From Contacto WHERE id = '.$id.'';
		$isEmpQ = mysqli_query($link, $isEmpSTR) or die(mysqli_error($link));
		$isEmp = mysqli_fetch_array($isEmpQ)[0];
		if($isEmp == 1)
		{
			$empresaSTR = 'SELECT id FROM empresa WHERE id_contact = '.$id.'';
			$empresaQ = mysqli_query($link, $empresaSTR) or die(mysqli_error($link));
			$empresa = mysqli_fetch_array($empresaQ)[0];
			$empregadosSTR = 'SELECT id_contacto FROM pessoas WHERE id_empresa = '.$empresa.'';
			$empregadosQ = mysqli_query($link, $empregadosSTR) or die(mysqli_error($link));	
			if (!isset($_POST['s']) && !isset($_POST['n']) && mysqli_num_rows($empregadosQ) > 0) 
			{   ?>	
				<div id="id01" class="w3-modal">
					<div class="w3-modal-content w3-card-4" style="border-radius: 6px">
						<header class="w3-container w3-pink" style="background-color: #d84780!important; border-radius: 6px 6px 0px 0px;">
							<h2 style="margin: 10px!important;">Eliminar Empresa!</h2>
						</header>
						<div class="w3-container">
							<br>
							<h4 align="center">Deseja eliminar todos os empregados da empresa?</h4><br>
							<div align="center">
								<form action="" method="POST">
									<button class="button" onclick="modalOut()" name="s">Sim</button>&nbsp;&nbsp;&nbsp;&nbsp;
									<button class="button" onclick="modalOut()" name="n">Não</button>
								</form>
							</div>
							<br>
						</div>
					</div>
				</div> <?php 
			} elseif (isset($_POST['s']) || isset($_POST['n']) && mysqli_num_rows($empregadosQ) > 0)
			{
				$i = 0;
				$empregados = array();
				while($empregadosA = mysqli_fetch_array($empregadosQ)) 
				{
					$empregados[$i] = $empregadosA[0];
					$i++;
				}
				if (isset($_POST['s']) && !isset($_POST['n'])) 
				{
					foreach ($empregados as $empregado => $idCont) 
					{
						$pessSTR = "DELETE FROM Contacto WHERE id = $idCont";
						$pessQ = mysqli_query($link, $pessSTR) or die(mysqli_error($link));
					}
					$empSTR = "DELETE FROM Contacto WHERE id = $id";
					$empQ = mysqli_query($link, $empSTR) or die(mysqli_error($link));
				echo "<p id='sucess'>Apagado com sucesso!</p>";
				} elseif (!isset($_POST['s']) && isset($_POST['n']))
				{
					foreach ($empregados as $empregado => $idCont) 
					{
						$pessSTR = "UPDATE pessoas SET id_empresa = NULL WHERE id_contacto = $idCont";
						$pessQ = mysqli_query($link, $pessSTR) or die(mysqli_error($link));
						$intSTR = "UPDATE Interno SET id_empresa=NULL, extensao=NULL, local=NULL WHERE id_contacto = $idCont";
						$intQ = mysqli_query($link, $intSTR) or die(mysqli_error($link));
					}
					$empSTR = "DELETE FROM Contacto WHERE id = $id";
					$empQ = mysqli_query($link, $empSTR) or die(mysqli_error($link));
					echo "<p id='sucess'>Dados alterados e apagados com sucesso!</p>";
				}
			} elseif (mysqli_num_rows($empregadosQ) == 0)
			{
				$empSTR = "DELETE FROM Contacto WHERE id = $id";
				$empQ = mysqli_query($link, $empSTR) or die(mysqli_error($link));
				echo "<p id='sucess'>Apagado com sucesso!</p>";
			}
		} else
		{
			$empSTR = "DELETE FROM Contacto WHERE id = $id";
			$empQ = mysqli_query($link, $empSTR) or die(mysqli_error($link));
			if ($_SESSION['user']['idCont'] == $id)
			{
				header('location: php/logout');
			}
			echo "<p id='sucess'>Apagado com sucesso!</p>";
		}?>
        <form action="editacont">
            <input type="submit" value="Voltar">
		</form>
    </section>
</div>
</div>
<?php include("php/footer.php"); ?>
<script>
	document.getElementById('id01').style.display='block';
	function modalOut()
	{
		document.getElementById('id01').style.display='none';
	}
</script>