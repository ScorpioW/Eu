<?php  
	$link= mysqli_connect("localhost","root","");
	if ($link==false)
	{
		echo "Não foi possivel ligar ao MySql";
		mysqli_error($link);
		exit;
	}
	$escolherbd= mysqli_select_db($link, "Contacto");
	mysqli_set_charset($link, "UTF8");
	if($escolherbd==False)
	{
		echo "Não foi possivel ligar à base de dados";
		mysqli_error($link);
		exit;
	}
?>