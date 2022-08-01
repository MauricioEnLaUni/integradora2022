<div class="modal fade" id="addEmailModal" tabindex="-1" aria-labelledby="addEmailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEmailModal">Agregar Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="user/accManager/emailInsert.php" method="post" id="insertEmail">
          <label class="col-7 addField">
            <p class="h4">Nuevo Email</p>
            <input type="email" name="inEm"/>
          </label>
        </form>
      </div>
      <div class="modal-footer">
        <button form="insertEmail" type="submit" class="btn btn-link col-3">Agregar</button>
        <button type="reset" class="btn btn-link col-3" data-bs-dismiss="modal">Descartar</button>
      </div>
    </div>
  </div>
</div>