<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>	
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Dados do Contacto da Pessoa</h2>
				
			</header>
    		<form action="" method="post" autocomplete="off">
	            Nome : <input type="text" name="nome"  class="textbox"><br>
                Morada :<input type="text" name="morada"  class="textbox"><br>
                Empresa : <font size="2" color="red">&nbsp;&nbsp;&nbsp;&nbsp;*Se não pertencer a nenhuma empresa deixe em branco</font><input type="text" name="empresa" class="textbox"><br>
	            Codigo Postal :<input type="text" name="codP"  class="textbox"   ><br>
	            Area :<input type="text" name="area"  class="textbox"><br>
	            Localidade :<input type="text" name="localidade"  class="textbox"><br>
	            Email :<input type="text" name="email"  class="textbox"><br>
                Telefone :<input type="text" name="telefone"  class="textbox"><br>
                
	            <input type="submit" name="submit" value="Registar">
	            <input type="reset" value="Limpar">
            </form>
        </section>
        <?php include("php/contpessoa2.php"); ?>
    </div>
<!-- /Page -->
</div>
</div>
	<?php include("php/footer.php") ;?>
	</body>
</html>