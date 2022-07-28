<?php
include_once "../../../ssl/connector.php";
$stmt = $conn->prepare('SELECT `us_dn`,`us_nm`,`us_ln`
                        FROM `users`
                        WHERE `us_id` = ?');
$stmt->execute([$_SESSION['userId']]);
if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<div class="container pt-2 px-5" id="accMain">
<div class="row">
  <p><a href="user.php">Mi Cuenta</a> > Datos Personales y Seguridad</p>
</div>

<div class="row text-center">
  <p class="h1">Datos Personales y Seguridad</p>
</div>

<div class="row" id="dataCont">
  <form action="">
    <label class="row">
      <p class="h4"><strong>Nombre de Usuario</strong></p>
      <div class="row" id="nameInputs">
          <?php
          $i = 0;
          foreach($row as $a){
            if(!is_null($a)){
              switch($i){
                case 0:
                  $out = "display";
                  break;
                case 1:
                  $out = "first";
                  break;
                case 2:
                  $out = "last";
                  break;
              }
              $i++;
              echo "<input value='$a' name='$out' disabled/>";
            }else{
              echo "<input value='¡No ha agregado su información!' disabled/>";
            }
          }}?>
      </div>
    </label>
    <button
      type="button"
      class="btn btn-primary mt-2"
      onclick="modInput('nameInputs')">
        Modificar
      </button>
  </form>

    <label class="row" id="emailIn">
      <p class="h4"><strong>Correo Electrónico</strong></p>
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
      <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#mAcc"
        onclick="modInput('emailIn')">
          Modificar
      </button>
    </label>
    
    <label class="row">
      <div class="row">
        <p class="h4"><strong>Teléfono</strong></p>
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
      <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#mAcc"
        onclick="modInput('phoneIn')">
          Modificar
      </button>
    </label>

    <label class="row mb-5">
    <div class="row">
      <p class="h4"><strong>Contraseña</strong></p>
    </div>
    <div class="row">
      ********
    </div>
    <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#mAcc"
        onclick="modInput('passIn')">
          Modificar
      </button>
    </label>
</div>