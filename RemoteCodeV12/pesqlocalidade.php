<?php include("php/validar.php");
	  $checked = 'checked = "true"';?>
		
		<div id="page" class="container margincont">
			<section>
				<header class="major">
					<h2>Pesquisa de Localidade</h2>
				</header>
				<form method="POST" autocomplete="off">
					<input type="checkbox" name="emp" id="emp" value="emp"<?php if(isset($_POST['emp'])){echo $checked;}?>/>
					<label for="emp">Empresas</label>
					<input type="checkbox" name="pes" id="pes" value="pes"<?php if(isset($_POST['pes'])){echo $checked;}?>/>&nbsp;&nbsp;&nbsp;
					<label for="pes">Pessoas</label><br>
					<input type="text" name="localidade" placeholder="Localidade..." class="textbox"><br>
					<input type="submit" onclick="check()" name="submit" value="Pesquisar">
					<input type="reset" value="Limpar">
					<a href="home"><input type="button" name="voltar" value="Voltar"></a>
					<p id="err"></p>
				</form>
			</section>
			<?php include("php/pesqlocalidade2.php"); ?>
		</div>
	</div>
	<?php include("php/footer.php"); ?>
<script>
	function check()
	{
		$(document).ready(function() {
			$('form').on('submit', function(e){
				if(!$('#emp:checkbox:checked').length > 0 && !$('#pes:checkbox:checked').length > 0) {
					document.getElementById("err").innerHTML = "<br>É necessário escolher uma opção de pesquisa!";
					e.preventDefault();
				}
			});
		});
	}
</script>