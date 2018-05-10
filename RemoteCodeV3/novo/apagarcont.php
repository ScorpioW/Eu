<!DOCTYPE HTML>
<html>	
<div id="page" class="container">
    <section>
        <form action="editacont.php">
            <input type="submit" value="Voltar">
        </form>
    </section>
</div>
</div>
	<?php include("../php/footer.php"); ?>
	</body>
</html>
<?php
	$id=$_GET['id'];
	include("../php/DB.php");
	$apagar = "DELETE from Contacto where id='$id'";
	$faz_apagar=mysqli_query($link, $apagar);
	echo "Apagado com sucesso!";
?>