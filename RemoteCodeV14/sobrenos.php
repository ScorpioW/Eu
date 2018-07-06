	<?php
		if (isset($_SESSION['sess_type']))
		{			
			$pr = $_SESSION['sess_type'] == 1;
		}
		if (!isset($_SESSION['login'])) {
			include('php/headerUtil.php');
		} else 
		{
			if (!$pr == 1) {
				include('php/headerUtil.php');
			} else
			{
				include('php/header.php');
			}
		}
	?>
	<!-- Banner -->
		

	<!-- Extra -->
		<div id="extra">
			<div class="container" id="page">
                <section>
				  <h2> Projeto de Contactos </h2>
				  <p>Este projeto foi desenvolvido no âmbito da FCT. 
					  Consiste em criar um website e base de dados para que se consiga procurar uma empresa ou individuo 
					  e obter-se as suas informações de contacto que em conjunto com um plugin será possivel
					  fazer uma chamada por telefone através deste.</p>		  
					  <p align="right"><font size="3">
					  	Diogo Torres 12ºC - <a href="mailto:diogosilvatorres98@gmail.com" id="mail">Contactar Diogo</a> <br>
						Gonçalo Camacho 12ºC - <a href="mailto:ibaiescola@hotmail.com" id="mail">Contactar Gonçalo</a><br><br>
						- Escola ESMTG 2017/2018<br>
						- Local Estágio ParSis 
					  </font></p>
                </section>
			</div>
		</div>
	<br><br>
</div>
	<!-- Copyright -->
		<?php include("php/footer.php"); ?>

	</body>
</html>