<?php include("php/validarAdmin.php");?>	
<div id="page" class="container">
    <section>
        <form action="editacont.php">
            <input type="submit" value="Voltar">
		</form>
		<?php
			$id=$_GET['id'];
			include("php/DB.php");
			$apagar = "DELETE from Contacto where id='$id'";
			$faz_apagar=mysqli_query($link, $apagar);
			echo "<p id='err'>Apagado com sucesso!</p>";
		?>
    </section>
</div>
</div>
<?php include("php/footer.php"); ?>