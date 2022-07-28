<?php
include_once "../modules/session.php";
include_once "../../../ssl/connector.php";
?>
<main id="accMain">
<div class="container pt-4 pb-5">
<div class="row">
  <p><a href="user.php">Mi Cuenta</a> > Mis Direcciones</p>
</div>

<div class="row text-center">
  <p class="h1">Mis Direcciones</p>
</div>
<div class="row mt-3">

<div class="col-md-3">
<div class="card">
<div class="card-body">
  Agregar Dirección
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<div class="card-body">
  <?php  
  $stmt = $conn->prepare('SELECT *
  FROM `address`
  WHERE `ad_us` = ?');
  $result = $stmt->execute([$_SESSION['userId']]);
  while($row = $stmt->fetch()){
    echo '<p class="h5">' . $_SESSION['display'] . "<br />";
    echo $row['ad_st'] . "<br />";
    echo $row['ad_nb'] . "<br />";
    echo $row['ad_zn'] . "<br />";
    echo $row['ad_cy'] . " " . $row['ad_ct'] . " " . $row['ad_ps'] . "<br />";
  }
    ?>
    <a href="">Editar</a>
    <a href="">Descartar</a>
  </p>
</div>
</div>
</div>

</div>

</div>
</main>