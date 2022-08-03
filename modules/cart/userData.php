<div class="row container mt-3" id="datosSale">
  <div class="row" id="printSale">
    <div class="col-12 col-md-6">
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
        <div class="col-8"><?php
        $ordDate = date("Y-m-d H:i:s");
        echo $ordDate;?></div>
        <?php echo '<input value="' . $ordDate . '" name="date" form="go" hidden/>';?>
      </div>
      <div class="row">
        <p class="h3">Dirección:</p>
          <button class="col-3">Cambiar</button>
        <p class="col-9"><?php echo $row['ad_nb'] . " " . $row['ad_st'] . " " . $row['ad_zn'] . "<br />" . $row['ad_cy'] . ", " . $row['ad_ct'];?></p>
        <?php
        $sendTo = $row['ad_id'];
        echo '<input value="' . $sendTo . '" name="address" form="go" hidden/>';?>
      </div>
    </div>
    <div class="col-6">
      <div class="accordion" id="payments">
        <div class="row d-flex justify-content-center mb-2">
          <select col="col-2" name="curr" id="currency" form="go" style="width:15vw;">
            <option value="MXN">MXN</option>
            <option value="USD">USD</option>
            <option value="GTQ">GTQ</option>
          </select>
        </div>
        <div id="ppplus">
        <!DOCTYPE html>
        <div id="paypal-button-container">
        <script src="https://www.paypal.com/sdk/js?client-id=AQxnhoT4JjQ8yCPNpsW7VB8vjID3vjKqkLASuuDFD-fm7JzjlYn8feOOL6jGlP2caXUpXhUVqUSS0cOp&currency=USD"></script>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="modules/cart/pp.js"></script>