<div class="row text-center">
  <p class="h1 mt-4">Mi Cuenta</p>
</div>
<div class="container" id="accPage">
  <div class="row mt-2 mb-5">
    <?php
    $content = [
      0=>['Órdenes','Revise su historial de compras.','orders.php','orden.svg'],
      1=>['Manejo de Cuenta','Cambien sus datos personales.','account.php','account.svg'],
      2=>['Direcciones','Maneje las direcciones de envio.','address.php','address.svg'],
      3=>['Pagos','Revise la información de pagos registrada.','pay.php','pay.svg'],
      4=>['Atención al Clientes','¿Dudas? ¡Contactenos!','/Integradora/contact.php','contact.svg'],
    ];
    foreach($content as $c){
      ?>
    <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center align-items-center">
      <a href="<?php echo $c[2];?>">
        <div class="row userNav d-flex">
            <img src="/Integradora/img/account/<?php echo $c[3];?>" alt="" class="col-4 align-self-center">
            <div class="col-8 align-self-center">
              <p class="h3 accNavTxt"><?php echo $c[0];?></p>
              <p class="accNavTxt"><?php echo $c[1];?></p>
            </div>
        </div>
      </a>
    </div>
    <?php
    }
    ?>


  </div>
</div>