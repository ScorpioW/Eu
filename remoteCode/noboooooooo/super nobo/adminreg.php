<?php  
header('Content-Type: text/html; charset=UTF-8');

include("DB.php");
include("validar.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>
<body bgcolor="#9bd3ec">
	<h2>Dados do Utilizador</h2><br>
	<form action="" method="post">
        
        Login: <input type="text" name="login"><br>
        Password:<input type="text" name="pass1"><br>
        Password 2 :<input type="text" name="pass2"><br>
        Id do seu contacto :<input type="text" name="idcont"><br>
        Direitos :<input type="text" name="direitos"><br>
        Localidade :
        <select name="localidade">
          <option value="Acores">Açores</option>
          <option value="Aveiro">Aveiro</option>
          <option value="Beja">Beja</option>
          <option value="Castelo Branco">Castelo Branco</option>
          <option value="Coimbra">Coimbra</option>
          <option value="Évora">Évora</option>
          <option value="Faro">Faro</option>
          <option value="Leiria">Leiria</option>
          <option value="Lisboa">Lisboa</option>
          <option value="Madeira">Madeira</option>
          <option value="Portalegre">Portalegre</option>
          <option value="Porto">Porto</option>
          <option value="Santarém">Santarém</option>
          <option value="Setubal">Setubal</option>
          <option value="Portalegre">Viana do Castelo</option>
          <option value="Portalegre">Vila Real</option>
          <option value="Viseu">Viseu</option>
        </select>
        <input type="submit" value="Registar">
        <input type="reset" value="Limpar">
        <?php include("reguser.php"); ?>
    </form>
</body>
</html>



