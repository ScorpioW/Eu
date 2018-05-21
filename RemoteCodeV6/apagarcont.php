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
			$apagar3 = "DELETE FROM	Telefone WHERE id_contacto = $id";
			$apagar4 = "DELETE FROM	Email WHERE id_contacto = $id";
			$faz_apagar=mysqli_query($link, $apagar);
			$faz_apagar=mysqli_query($link, $apagar3);
			$faz_apagar=mysqli_query($link, $apagar4);
			echo "<p id='err'>Apagado com sucesso!</p>";
		?>
    </section>
</div>
</div>
<?php include("php/footer.php"); ?>