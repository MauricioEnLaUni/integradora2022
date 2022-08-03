<div class="row d-flex justify-content-center">
  <form action="modules/cart/orderGo.php" method="POST" id="go">
    <label class="col-10 m-1">
      <input type="checkbox" name="acuerdo" value="y" required/> He leido y acepto los Términos y Condiciones de compra.
    </label>
    <label class="col-10 m-1">
      <input type="checkbox" name="suscribir" value="y"/> Suscribirme para obtener más ofertas.
    </label>
        <!-- <div class="g-recaptcha" data-sitekey="your_site_key"></div> -->
    <br/>
    <div class="row d-flex justify-content-center">
      <button
      type="submit"
      class="btn btn-info mx-5 mt-2 col-8 col-sm-4 col-md-3"
      value="orderGo"
      id="continueButton"
      >Confirmar Pedido</button>
      <input type="reset" class="btn btn-secondary mx-2 col-8 col-sm-4 col-md-3 mt-2" value="Cancelar" />
    </div>
  </form>
  </div>
</div>