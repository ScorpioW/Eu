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
			VALUES ('1',".$nome."',   '".$morada."',  '".$codP."',  '".$localidade."')";
			mysqli_query($link, $inserir);
			$inserir2="SELECT id FROM Table ORDER BY ID DESC LIMIT 1"
			mysqli_query($link,$inserir2);
			
			$inserir3="INSERT INTO Email(id_contacto, email) 
			VALUES ('".$inserir2."', '".$nome."'  )";
			mysqli_query($link,$inserir3);

			$inserir4="INSERT INTO Telefone(id_contacto, telefone) 
			VALUES ('".$inserir2."', '".$nome."'  )";
			mysqli_query($link,$inserir4);
			header("location: contaCriada.php");	
				
			}
			else
			{
				echo ('Empresa');
			}
	}
?>