<div class="listsLogos">
  <a
  class="btn btn-link"
  href="cart.php">
    <img src="img/svg/cart.svg" alt="Cart Button" />
    <span class="badge text-bg-secondary"><?php echo count($_SESSION['cart'])?></span>
  </a>
</div>
<div class="listsLogos">
  <a
  class="btn btn-link"
  href="modules/cart.php">
    <img src="img/svg/heart-fill.svg" alt="Cart Button" />
  </a>
</div>
<form id="Out" action="modules/log.php" method="POST" display="none"></form>
<div class="logButtons">
  <img src="/Integradora/img/svg/personFill.svg" alt="" />
  <a
  class="btn btn-link"
  href="/Integradora/user.php"
  role="button">
      Perfil
</a>
</div>
<div class="logButtons">
  <img src="/Integradora/img/svg/personFill.svg" alt="" />
  <button
  name="logOut"
  form="Out"
  class="btn btn-link"
  data-bs-toggle="modal"
  role="submit">
      Salir
  </button>
</div>