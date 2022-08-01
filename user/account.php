<?php
include_once CONN . "/connector.php";
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
  <form action="user/accManager/accountName.php" method="POST">
    <label class="row">
      <p class="h4"><strong>Nombre de Usuario</strong></p>
      <div class="row" id="nameInputs">
        <div class="col-md-9">
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
                echo "<input value='$a' name='$out' style='width:100%' disabled/>";
              }else{
                echo "<input value='¡No ha agregado su información!' style='width:100%; margin-bottom:10px;' disabled/>";
              }
            }}?>
          </div>
          <div class="col-md-3">
            <p>Usuario</p>
            <p>Nombre</p>
            <p>Apellido</p>
          </div>
      </div>
    </label>
    <div class="row">
      <button
      type="button"
      class="btn btn-primary mt-2 col-2"
      onclick="modInput('nameInputs','subName')">
        Modificar
      </button>
      <button type="submit" class="btn btn-info mt-2 col-2 mx-2" disabled id="subName">Enviar</button>
    </div>
  </form>

  <form action="user/accManager/accountEmail.php" method="post" id="mailForm"></form>
  <form action="user/accManager/rmvEmail.php" method="POST" id="rmvEmail"></form>
    <p class="h4"><strong>Correo Electrónico</strong></p>
      <div class="row" id="emailIn">
        <div class="col-md-9">
          <?php
          $stmt = $conn->prepare('SELECT `em_em`,`em_id`
          FROM `email`
          WHERE `em_us` = ?');
          $stmt->execute([$_SESSION['userId']]);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $emailCount = count($result);
          foreach($result as $row){
            echo "<input form='mailForm' id='em" . $row['em_id'] . "' value='" . $row['em_em'] . "' name='email[]' hidden />";
            echo "<input class='col-9' style='width:100%; margin-bottom:10px;' form='mailForm' id='em" . $row['em_id'] . "' value='" . $row['em_em'] . "' name='email[]' disabled />";
            if($emailCount > 1){
              echo "<input type='number' name='rmv' form='rmvEmail' value='" . $row['em_id'] . "' hidden/>";
              echo "<input class='col-3' type='submit' form='rmvEmail' style='width:100%; margin-bottom:10px;' value='Eliminar' />";
            }
          }
          ?>
      </div>
      </div>
    <div class="row">
      <button
      type="button"
      class="btn btn-primary m-2 mb-5 col-2"
      onclick="modInput('emailIn','subEmail')">
        Modificar
      </button>
      <button type="submit" class="btn btn-info m-2 mb-5 col-2" form='mailForm' id="subEmail" disabled>Enviar</button>
    </div>
    <div class="col-md-9 d-flex justify-content-center">
  <?php
  if($emailCount < 3){?>
  <button class="row d-flex justify-content-center align-items-center" style='width:30%; margin-bottom:10px;' id="emailMod" data-bs-toggle="modal" data-bs-target="#addEmailModal"> Añadir Email
  </button>
  </div>
  <?php }?>
    
  <form action="user/accManager/updatePhone.php" method="post" id="phoneForm"></form>
  <form action="user/accManager/rmvPhone.php" method="post" id="rmvPhone"></form>
    <div class="row">
      <p class="h4"><strong>Teléfono</strong></p>
    </div>
    <div class="row" id="phoneIn">
    <div class="col-md-9">
      <?php
      $stmt = $conn->prepare('SELECT *
      FROM `phone`
      WHERE `ph_us` = ?');
      $stmt->execute([$_SESSION['userId']]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $phoneCount = count($result);
      foreach($result as $row){
        echo "<input form='phoneForm' value='" . $row['ph_nm'] . "' name='phone[]'  hidden/>";
        echo "<input form='phoneForm' style='width:50%; margin-bottom:10px;' class='col-3' value='" . $row['ph_nm'] . "' name='phone[]' disabled/>";
        if($phoneCount < 2){
          echo "<input type='number' name='rmv' form='rmvPhone' value='" . $row['ph_id'] . "' hidden/>";
          echo "<input class='col-3' style='margin-left:5px;' type='submit' form='rmvPhone'  value='Eliminar' />";
        }
      }
      ?>
      </div>
    </div>
    
    <div class="row">
    <button
      type="button"
      class="btn btn-primary m-2 mb-5 col-2"
      onclick="modInput('phoneIn','phoneMod')">
        Modificar
    </button>
    <button type="submit" class="btn btn-info m-2 mb-5 col-2" form="phoneForm">Enviar</button>
    </div>
    <div class="col-md-9 d-flex justify-content-center">
  <?php
  $phoneCount = 0;
  if($phoneCount < 3){?>
  <button class="row justify-content-center align-items-center" style='width:30%; margin-bottom:10px;' id="phoneMod" data-bs-toggle="modal" data-bs-target="#addPhoneModal"> Añadir Teléfono</button>
  <?php }?>
  </div>

  <form action="user/accManager/accountPwd.php" method="post">
    <label class="row" id="passIn">
      <div class="row">
        <p class="h4"><strong>Contraseña</strong></p>
      </div>
      <div class="row">
      <div class="col-md-9">
        <input style='width:100%; margin-bottom:10px;' value="********" name="pwd" type="password" disabled minlength="16" maxlength="32"/>
      </div>
    </label>
    <div class="row">
      <button
        type="button"
        class="btn btn-primary m-2 mb-5 col-2"
        onclick="modInput('passIn','subPass')">
          Modificar
      </button>
      <button type="submit" class="btn btn-info m-2 mb-5 col-2" disabled id="subPass">Enviar</button>
    </div>
    </div>
  </form>
</div>