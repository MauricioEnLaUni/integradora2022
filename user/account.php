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
  <form action="/Integradora/user/modules/accountName.php" method="POST">
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

  <form action="accountEmail.php" method="post">
    <label class="row" id="emailIn">
      <p class="h4"><strong>Correo Electrónico</strong></p>
      <div class="row">
        <?php
        $stmt = $conn->prepare('SELECT `em_em`,`em_id`
        FROM `email`
        WHERE `em_us` = ?');
        $stmt->execute([$_SESSION['userId']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
          echo "<input id='em" . $row['em_id'] . "' value='" . $row['em_em'] . "' name='email[]' disabled/>";
        }
        ?>
      </div>
    </label>
    <div class="row">
      <button type="button" class="btn btn-info m-2 mb-5 col-2">Insertar</button>
      <button
      type="button"
      class="btn btn-primary m-2 mb-5 col-2"
      onclick="modInput('emailIn')">
        Modificar
      </button>
      <button type="submit" class="btn btn-info m-2 mb-5 col-2">Enviar</button>
    </div>
  </form>
    
  <form action="accountUpdate.php" method="post">
    <label class="row" id="phoneIn">
      <div class="row">
        <p class="h4"><strong>Teléfono</strong></p>
      </div>
      <div class="row">
        <?php
        $stmt = $conn->prepare('SELECT `ph_nm`
        FROM `phone`
        WHERE `ph_us` = ?');
        $stmt->execute([$_SESSION['userId']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
          echo "<input value='" . $row['ph_nm'] . " name='phone[]'  disabled/>";
          echo "<input value='" . $row['ph_nm'] . " name='phone[]' disabled/>";
        }
        ?>
      </div>
    </label>
    
    <div class="row">
    <button type="button" class="btn btn-info m-2 mb-5 col-2">Insertar</button>
    <button
      type="button"
      class="btn btn-primary m-2 mb-5 col-2"
      onclick="modInput('phoneIn')">
        Modificar
    </button>
    <button type="submit" class="btn btn-info m-2 mb-5 col-2">Enviar</button>
    </div>
  </form>

  <form action="/Integradora/user/modules/accountPwd.php" method="post">
    <label class="row" id="passIn">
      <div class="row">
        <p class="h4"><strong>Contraseña</strong></p>
      </div>
      <div class="row">
        <input value="********" name="pwd" type="password" disabled minlength="16" maxlength="32"/>
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
  </form>
</div>