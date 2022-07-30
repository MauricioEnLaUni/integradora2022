<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModal">Agregar Dirección</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/Integradora/user/modules/addInsert.php" method="post" id="insertAddress">
        <label class="col-7 addField">
          <p class="h4">Calle:</p>
          <input type="text" name="st"/>
        </label>
        <label class="col-4 addField">
          <p class="h4">Número: </p>
          <input type="number" name="nb" id="nbAdd"/>
        </label>
        <label class="col-12 addField">
          <p class="h4">Colonia: </p>
          <input type="text" name="zn"/>
        </label>
        <label class="col-12 addField">
          <p class="h4">Código Postal: </p>
          <input type="text" name="ps"/>
        </label>
        <label class="col-7 addField">
          <p class="h4">Ciudad: </p>
          <input type="text" name="cy"/>
        </label>
        <label class="col-3 addField">
          <p class="h4">País: </p>
          <select name="ct" id="country">
            <option value="GT">GT</option>
            <option value="CU">CU</option>
            <option value="MX">MX</option>
            <option value="US">US</option>
          </select>
        </label>
      </form>
      </div>
      <div class="modal-footer">
        <button form="insertAddress" type="submit" class="btn btn-link col-3">Agregar</button>
        <button form="insertAddress" type="reset" class="btn btn-link col-3" value="1" href="addResult.php" data-bs-dismiss="modal">Descartar</button>
      </div>
    </div>
  </div>
</div>