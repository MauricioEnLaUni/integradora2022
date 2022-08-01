<div class="row">
  <form action="confirmación.php" method="POST">
    <label>
      <input type="checkbox" name="acuerdo" id="" required/> He leido y acepto los Términos y Condiciones de compra.
    </label>
    <label>
      <input type="checkbox" name="suscribir" id="" /> Suscribirme para obtener más ofertas.
    </label>
    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
    <br/>
    <button
    type="submit"
    value="Comfirmar Pedido"
    id="continueButton"
    onclick="ppp.doContinue();return false;"></button>
    <input type="reset" value="Cancelar" />
    </form>
  </div>
</div>