<?php  
header('Content-Type: text/html; charset=UTF-8');
include("php/DB.php");
$pessoa = "";
$err = "";?>	

<div id="page" class="container">
    <section>
        <?php  
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

        if (!empty($_SESSION['user']['emp']))
        {
            $existe="SELECT pessoas.nome, extensao, local, email, email2
                        FROM Interno, Email, Contacto, pessoas
                        WHERE pessoas.nome LIKE '%$pessoa%' 
                        AND Interno.id_contacto = Contacto.id
                        AND Email.id_contacto = Contacto.id
                        AND pessoas.id_contacto = Contacto.id
                        AND pessoas.id_empresa = ".$_SESSION['user']['emp']."
                        AND pessoas.nome NOT LIKE '%".$_SESSION['user']['login']."%'
                        ORDER BY pessoas.nome ASC";

            $se_existe=mysqli_query($link, $existe) or die(mysqli_error($link));
            $num_registos=mysqli_num_rows($se_existe); 
            if ($num_registos>0){}
            else
            {
                echo '<p id="err">'.$pessoa.' não se encontra registado(a)!</p>';
                exit;
            }
            ?>
            <br>
            <table class="default" id="pequeno">
            <tr><th>Nome<th>Extensão<th>Email<th>Local
            
            <?php
                for ($i=0;$i<$num_registos;$i++)
                {
                    $registos=mysqli_fetch_array($se_existe);
                    echo '<tr>';
                    echo '<td>'.$registos["nome"]. '</td>';
                    echo '<td>'.$registos["extensao"]. '</td>';
                    echo '<td>' .$registos["email"]. ' <br> '.$registos['email2'].'</td>';
                    echo '<td>'.$registos["local"].'</td>';
                    echo '</tr>';
                }
                echo '</table><br>';
                
        }else
        {
            echo '<p id="err">Não tem nenhuma empresa associada!</p>';
        } ?>

    </section>
</div> 