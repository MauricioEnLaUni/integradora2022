<div class="row container" id="datosSale">
  <div class="row" id="printSale">
    <div class="col-6">
      <div class="row">
        <div class="col-3"><p class="h4">Nombre: </p></div>
        <div class="col-8"><?php echo $row['us_nm'] . " " . $row['us_ln'];?></div>
      </div>
      <div class="row">
        <div class="col-3"><p class="h4">Órden: </p></div>
        <div class="col-8"><?php echo $row['us_nm'] . " " . $row['us_ln'];?></div>
      </div>
      <div class="row">
        <div class="col-3"><p class="h4">Fecha: </p></div>
        <div class="col-8"><?php echo date("Y-m-d H:i:s");?></div>
      </div>
      <div class="row">
        <p class="h3">Dirección:</p>
          <button class="col-3">Cambiar</button>
        <p class="col-9"><?php echo $row['ad_nb'] . " " . $row['ad_st'] . " " . $row['ad_zn'] . "<br />" . $row['ad_cy'] . ", " . $row['ad_ct'];?></p>
      </div>
    </div>
    <div class="col-6">
      <div class="accordion" id="payments">
        <div id="ppplus"></div>
      </div>
    </div>
  </div>
</div>