<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$nome = $_POST['nome'];
		$morada = $_POST['morada'];
		$codP = $_POST['codP'];
		$area = $_POST['area'];
		$localidade = $_POST['localidade'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
				
		mysqli_query($link, "SET NAMES UTF8");

		$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
		VALUES (1,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
		mysqli_query($link, $inserir) or die("Inserir 1");

		$shit="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
		$selectQ = mysqli_query($link, $shit) or die("Select");

		while ($select = mysqli_fetch_array($selectQ))
		{
				$s = $select['0'];
		}

		$inserir2 = "INSERT INTO empresa(nome, id_contact) VALUES ('".$nome."', ".$s.")";
		mysqli_query($link, $inserir2) or die("Inserir 2");

		$inserir3="INSERT INTO Email(id_contacto, email) VALUES (".$s.", '".$email."'  )";
		mysqli_query($link,$inserir3) or die("Inserir 3");

		$inserir4="INSERT INTO Telefone(id_contacto, telefone) VALUES (".$s.", '".$telefone."'  )";
		mysqli_query($link,$inserir4) or die("Inserir 4");
	}
?>