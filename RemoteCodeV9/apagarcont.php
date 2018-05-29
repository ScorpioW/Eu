<?php include("php/validarAdmin.php");?>	
<?php
    if (isset($_SERVER['HTTP_REFERER'])) {
    $ref_url = $_SERVER['HTTP_REFERER'];
    }else{
	$ref_url = 'No referrer set';
	}
	if (strpos($ref_url, 'editacont.php') != True) 
	{
		header("location: paginareservada.php");
	}
	?>
<div id="page" class="container">
    <section>
		<?php
			$id=$_GET['id'];
			include("php/DB.php");
			$apagar = "DELETE from Contacto where id='$id'";
			$faz_apagar=mysqli_query($link, $apagar);
			echo "<p id='sucess'>Apagado com sucesso!</p>";
		?>
        <form action="editacont.php">
            <input type="submit" value="Voltar">
		</form>
    </section>
</div>
</div>
<?php include("php/footer.php"); ?>