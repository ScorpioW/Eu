<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$nome = $_POST['nome'];
        $local = $_POST['local'];
        $em = $_POST['em'];
        $em2 = $_POST['em2'];
		$num = $_POST['extensao'];


		
		try
		{
			if (strlen($nome) >= 1 && strlen($nome) <= 50) 
			{
				if (preg_match('/[a-zA-Z0-9_]+/', $nome) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $nome)) 
				{
					if (filter_var($em, FILTER_VALIDATE_EMAIL) || $em == "")
					{
						if (!$em == "") {
							$em = "'" . mysqli_escape_string($link, $em) . "'";
						} else {
							$em = "NULL";
						}
						if (filter_var($em2, FILTER_VALIDATE_EMAIL) || $em2 == "") 
						{				
							if (!$em2 == "") {
								$em2 = "'" . mysqli_escape_string($link, $em2) . "'";
							} else {
								$em2 = "NULL";
							}	
								if (preg_match("/^[0-9]{4}$/", $num)
								{
										if (preg_match("/^[0-9]{4}$/", $num))
										{

										} 
										else
										{
											$num = "NULL";
											
										}
										
											if ((preg_match('/[a-zA-Z0-9_]+/', $local) && !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/', $local))  || $local == "") 
											{ 
											
												
														
														$inserir="INSERT INTO Contacto( nome, isInterno) 
														VALUES ('"$nome."','"1")";
														mysqli_query($link, $inserir) or die("Inserir 1");
														$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
														$selectQ = mysqli_query($link, $q) or die("Select");
														while ($select = mysqli_fetch_array($selectQ))
														{
																$s = $select[0];
														}
														$inserir2 = "INSERT INTO Interno2(nome, extensao, local) VALUES ('".$nome."', '".$emp."',".$s.")";
														}
														mysqli_query($link, $inserir2) or die("Inserir 2");
														$inserir3="INSERT INTO Email(id_contacto, email, email2) VALUES (".$s.", ".$em.", ".$em2.")";
														mysqli_query($link,$inserir3) or die("Inserir 3");

														

																				
												
											} 
											else
											{
												echo '<p id="err">A local que inseriu é inválida</p>';
											}

										
									} else
									{
										echo '<p id="err">Código Postal Errado</p>';
									}
						} 
						else
						{
							echo '<p id="err">Email Secundário Inválido';
						}
					} 
					else
					{
						echo '<p id="err">Email Primário Inválido';
					}			
		} catch(Exception $e) 
		{
			echo 'Erro: ' .$e->getMessage();
		}
        
	}
?>