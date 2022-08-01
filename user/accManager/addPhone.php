<div class="modal fade" id="addPhoneModal" tabindex="-1" aria-labelledby="addPhoneModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPhoneModal">Agregar Teléfono</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="user/accManager/phoneInsert.php" method="post" id="insertPhone">
          <label class="col-7 addField">
            <p class="h4">Nuevo Teléfono</p>
            <input type="tel" name="inPh"/>
          </label>
        </form>
      </div>
      <div class="modal-footer">
        <button form="insertPhone" type="submit" class="btn btn-link col-3">Agregar</button>
        <button type="reset" class="btn btn-link col-3" data-bs-dismiss="modal">Descartar</button>
      </div>
    </div>
  </div>
</div>