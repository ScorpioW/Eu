<?php  
    header('Content-Type: text/html; charset=UTF-8');
    include("php/DB.php");
    include("php/validar.php");
    if ($_SESSION['user']['sess_type'] == 4)
	{
		header("location: paginareservada");
	}
?>
	<div id="page" class="container">
		<section>
			<header class="major">
				<h2>Criar Contacto</h2>
			</header>
            <a href="contempresa">
                <input type="button" name="criaEmpresa" value="Registar uma Empresa">
            </a>
            <a href="contpessoa">
                <input type="button" name="criaPessoa" value="Registar uma Pessoa">
            </a>
            <a href="homeAdmin">
                <input type="button" name="voltar" value="Voltar">
            </a>
		</section>
	</div>
</div>
</div>
	<?php include("php/footer.php") ;?>