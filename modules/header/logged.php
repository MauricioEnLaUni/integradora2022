<?php
$cartSize = 0;
foreach($_SESSION['cart'] as $c){
  $cartSize += $c;
}
?>
<div class="listsLogos col-2 d-flex justify-content-center">
  <a
  class="btn btn-link position-relative"
  href="cart.php">
    <img src="img/svg/cart.svg" alt="Cart Button" />
    <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger"><?php
    if($cartSize > 0) echo $cartSize;?></span>
  </a>
</div>
<form id="Out" action="modules/log.php" method="POST" display="none"></form>
<div class="logButtons col-3">
  <img src="img/svg/personFill.svg" alt="" />
  <a
  class="btn btn-link"
  href="user.php"
  role="button">
      Perfil
</a>
</div>
<div class="logButtons col-3">
  <img src="img/svg/personFill.svg" alt="" />
  <button
  name="logOut"
  form="Out"
  class="btn btn-link"
  data-bs-toggle="modal"
  role="submit">
      Salir
  </button>
</div>