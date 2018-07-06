<?php 
    if (isset($_SERVER['HTTP_REFERER'])) {
        $ref_url = $_SERVER['HTTP_REFERER'];
    }else{
        $ref_url = 'No referrer set';
    }
    if (strpos($ref_url, 'pesqempresa') != True && strpos($ref_url, 'pesqlocalidade') != True && strpos($ref_url, 'editacont') != True) 
    {
        header("location: paginareservada");
    }
    include('php/validar.php');
?>
    <div id="page" class="container margincont">
        <section>
            <?php include("php/empregados2.php");?>
            <input type="button" value="Voltar" onclick="window.history.back()"/> 
        </section>
    </div>
</div>
<?php include("php/footer.php"); ?>