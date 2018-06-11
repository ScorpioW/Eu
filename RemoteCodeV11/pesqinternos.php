<!DOCTYPE HTML>
<?php include("php/validar.php");?>
    

<!-- Page -->
<div id="page" class="container margincont">
    <section>
         <header class="major">
            <h2>Pesquisa de Contactos Internos</h2>
        </header>
        <form method="POST" autocomplete="off">
            <input type="text" name="pessoa" placeholder="Nome da Pessoa..." class="textbox"><br>
            <input type="submit" name="submit" value="Pesquisar">
            <input type="reset" value="Limpar">
            <a href="home.php"><input type="button" name="voltar" value="Voltar"></a>
        </form>
    </section>
    <?php include("php/pesqinternos2.php"); ?>
</div>
    
<!-- /Page -->
</div>
	<!-- Copyright -->
<?php include("php/footer.php"); ?>