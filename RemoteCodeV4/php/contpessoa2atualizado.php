<?php  
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['submit']))
	{
		include("php/DB.php");
		$nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $empresa = $_POST['empresa'];
		$codP = $_POST['codP'];
		$area = $_POST['area'];
		$localidade = $_POST['localidade'];
		$email = $_POST['email'];
        $telefone = $_POST['telefone'];
        
        
		mysqli_query($link, "SET NAMES UTF8");

		$confEmpresaS = "SELECT id FROM empresa WHERE nome LIKE '".$empresa."'";
        $confEmpresaQ = mysqli_query($link, $confEmpresaS);
        $resEmpresas = mysqli_num_rows($confEmpresaQ);

        
        if (empty($empresa)) 
        {
        	$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
				VALUES (0,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
				mysqli_query($link, $inserir) or die("Inserir 1");
				$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
				$selectQ = mysqli_query($link, $q) or die("Select");
				while ($select = mysqli_fetch_array($selectQ))
				{
						$s = $select['0'];
				}
            $empresa = "NULL";
            $inserir2 = "INSERT INTO pessoas(nome, id_empresa, id_contacto) VALUES ('".$nome."', ".$empresa.",".$s.")";
         }


        elseif ($resEmpresas == 0) 
        {
            die("<p>Não existe nenhuma empresa com esse nome.</p>");
        }



        else{

				$inserir="INSERT INTO Contacto(isEmpresa, nome, morada, codP, area, Localidade) 
				VALUES (0,'".$nome."',   '".$morada."', ".$codP.",  ".$area.",'".$localidade."')";
				mysqli_query($link, $inserir) or die("Inserir 1");
				$q="SELECT id FROM Contacto ORDER BY ID DESC LIMIT 1";
				$selectQ = mysqli_query($link, $q) or die("Select");
				while ($select = mysqli_fetch_array($selectQ))
				{
						$s = $select['0'];
				}
            
                $inserir2 = "INSERT INTO pessoas(nome, id_empresa, id_contacto) VALUES ('".$nome."', '".$emp."',".$s.")";
            
        }
		mysqli_query($link, $inserir2) or die("Inserir 2");
		$inserir3="INSERT INTO Email(id_contacto, email) VALUES (".$s.", '".$email."')";
		mysqli_query($link,$inserir3) or die("Inserir 3");
		$inserir4="INSERT INTO Telefone(id_contacto, telefone) VALUES (".$s.", '".$telefone."'  )";
		mysqli_query($link,$inserir4) or die("Inserir 4");
	}
}
?>