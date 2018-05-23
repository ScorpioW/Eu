<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>	
<!-- Page -->
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Dados do Contacto</h2>
				
			</header>
                
                <a href="contempresa.php">
                    <input type="button" name="criaEmpresa" value="Registar uma Empresa">
                </a>
                <a href="contpessoa.php">
                    <input type="button" name="criaPessoa" value="Registar uma Pessoa">
                </a>
        	
		</section>
	</div>
<!-- /Page -->
</div>
</div>
	<?php include("php/footer.php") ;?>
	</body>
</html>