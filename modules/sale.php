<div class="container-fluid">
        <div class="row">
            <h1 id="titleSale">Confirmación de Compra</h1>
        </div>
        <div class="row container" id="datosSale">
            <div class="row" id="printSale">
                <div class="col-4">

                </div>
                <div class="col-8">
                    <div class="accordion" id="payments">
                        <?php
                        include "modules/acordeon.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="salesTable">
            <div class="row" id="tHeader">
                <div class="col-1">No.</div>
                <div class="col-6">Producto</div>
                <div class="col-2">Precio/Unidad</div>
                <div class="col-2">Cantidad</div>
                <div class="col-1">Quitar</div>
            </div>
        </div>
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
                <input type="submit" value="Comfirmar Pedido">
                <input type="reset" value="Cancelar" />
            </form>
        </div>
    </div>