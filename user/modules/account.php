<?php
include_once "../../../ssl/connector.php";
$stmt = $conn->prepare('SELECT `us_dn`,`us_nm`,`us_ln`
                        FROM `users`
                        WHERE `us_id` = ?');
$stmt->execute([$_SESSION['userId']]);
if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<div class="container pt-4">
<div class="row">
  <p><a href="user.php">Mi Cuenta</a> > Datos Personales y Seguridad</p>
</div>

<div class="row text-center">
  <p class="h1">Datos Personales y Seguridad</p>
</div>

<div class="row mt-3">
<div class="col-8">
  <div class="row">
    <strong>Nombre de Usuario</strong>
  </div>
  <div class="row">
    <?php
    foreach($row as $a){
      if(!is_null($a)){
        echo "<input value='$a' disabled/>";
      }else{
        echo "<input value='¡No ha agregado su información!' disabled/>";
      }
    }
  }
    ?>
  </div>
</div>
<div class="col-4">
  <button
  type="button"
  class="btn btn-primary"
  data-bs-toggle="modal"
  data-bs-target="#mAcc"
  onclick="accModal(1)">
    Modificar
  </button>
</div>
</div>

<div class="row mt-3">
<div class="col-8">
  <div class="row">
    <strong>Correo Electrónico</strong>
  </div>
  <div class="row">
    <?php
    $stmt = $conn->prepare('SELECT `em_em`
    FROM `email`
    WHERE `em_us` = ?');
    $stmt->execute([$_SESSION['userId']]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      echo "<input value='" . $row['em_em'] . "' disabled/>";
    }
    ?>
  </div>
</div>
<div class="col-4">
  <button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#mAcc"
    onclick="accModal(2)">
      Modificar
  </button>
</div>
</div>

<div class="row mt-3">
<div class="col-8">
  <div class="row">
    <strong>Teléfono</strong>
  </div>
  <div class="row">
    <?php
    $stmt = $conn->prepare('SELECT `ph_nm`
    FROM `phone`
    WHERE `ph_us` = ?');
    $stmt->execute([$_SESSION['userId']]);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      echo "<input value='" . $row['ph_nm'] . "' disabled/>";
    }
    ?>
  </div>
</div>
<div class="col-4">
  <button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#mAcc"
    onclick="accModal(3)">
      Modificar
  </button>
</div>
</div>

<div class="row mt-3 pb-5">
<div class="col-8">
  <div class="row">
    <strong>Contraseña</strong>
  </div>
  <div class="row">
    ********
  </div>
</div>
<div class="col-4">
  <button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#mAcc"
    onclick="accModal(4)">
      Modificar
  </button>
</div>
</div>


</div>