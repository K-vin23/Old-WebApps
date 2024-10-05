<?php
include ("Components/Header.php");
?>
    <div class="cards">
    <?php                  
        foreach ($modelos as $modelo){
    ?>
        <div class="card">  
            <img src="<?php echo $modelo['RutaIMG']?>" alt="Avatar" style="width:100%">
            <div>
                <h4><b><?php echo $modelo['Modelo']?></b></h4>
                <h5><?php echo $modelo['Marca']?></h5>
                <p>$<?php echo $modelo['Precio_Unit']?></p>
            </div>
            <div class="buttonline">
                <button type="button" class="btn btn-outline-primary">ver mas</button>
                <button type="button" class="btn btn-outline-info">comprar</button>
            </div>
        </div>
        <?php }?>
    </div>
    
</body>
</html>