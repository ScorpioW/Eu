<?php
    include('DB.php');
    header('Content-Type: text/html; charset=UTF-8'); 
    $empID = $_GET['id'];

    $sql = 'SELECT nome, id
            FROM empresa
            WHERE id = '.$empID.'';
    $q = mysqli_query($link, $sql) or die(mysqli_error($link));;
    $empresa = mysqli_fetch_array($q)[0];
    echo '<h2>Empregados da empresa '.$empresa.'</h2><br>';

    $sql = 'SELECT DISTINCT Contacto.nome, telefone, telefone2, email, email2, Localidade, morada, codP, area
            FROM Contacto, Telefone, Email, pessoas, empresa
            WHERE pessoas.id_empresa = '.$empID.'
            AND pessoas.id_contacto = Contacto.id
            AND Telefone.id_contacto = Contacto.id
            AND Contacto.nome NOT LIKE "%'.$_SESSION["user"]["login"].'%"
            AND Email.id_contacto = Contacto.id
            ORDER BY Contacto.nome ASC';

    $q = mysqli_query($link, $sql) or die(mysqli_error($link));

    
    $empregados = mysqli_num_rows($q);
    
    if ($empregados < 1) 
    {
        echo '<p id="err">Não existem empregados na empresa '.$empresa.'!</p>';
        
    }else
    {?>
    <table class="default" id="grande">
        <tr><th>Nome<th>Telefone<th>Email<th>Localidade<th>Morada<th>Codigo Postal
        <?php  
            for ($i=0;$i<$empregados;$i++)
            {
                $empregado = mysqli_fetch_array($q);
                if ($empregado['codP'] == 0 && $empregado['area'] == 0)
                {
                    $empregado['codP'] = ""; 
                    $empregado['area'] = "";
                }
                echo '<tr>';
                echo '<td>'.$empregado["nome"]. '</td>';
                echo '<td>'.$empregado["telefone"].$empregado['telefone2'].'</td>';
                echo '<td>'.$empregado["email"]. ' <br> '.$empregado['email2'].'</td>';
                echo '<td>'.$empregado["Localidade"]. '</td>';
                echo '<td>'.$empregado["morada"]. '</td>';
                echo '<td>'.$empregado["codP"]. '-'.$empregado["area"]. '</td>';
                echo '</tr>';
            }
         ?>
    </table>
    <?php } ?>