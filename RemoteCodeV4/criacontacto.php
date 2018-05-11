<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validarAdmin.php");
?>

<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php include("php/header.php") ;?>		
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
	<?php include("php/footer.php") ;?>
	</body>
</html>