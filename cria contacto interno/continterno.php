<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>	
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Dados do Contacto Interno</h2>
				
			</header>
    		<form action="" method="post" autocomplete="off">
	            Nome: <font size="2" color="red">&nbsp;*</font> <input type="text" name="nome"  class="textbox" placeholder="Nome..."><br>
				Extensao
				<input type="numeric" name="num" size="3" placeholder="Ex.: 9999">
			   		<br><br>
	            Local :<input type="text" name="local"  class="textbox" placeholder="Ex.: Lisboa"><br>
	            Email: <input type="email" name="em" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
				Email 2: <input type="email" name="em2" placeholder="Exemplo@Exemplo.com" class="textbox"><br>
                <font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Campos de preenchimento obrigatório</font><br><br>
	            <input type="submit" name="submit" value="Registar">
				<input type="reset" value="Limpar">
				<a href="home.php"><input type="button" name="voltar" value="Voltar"></a>
            </form>
        </section>
        <?php include("php/continterno2.php"); ?>
    </div>
<!-- /Page -->
</div>
</div>
	<?php include("php/footer.php") ;?>
	</body>
</html>