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
      if($_SESSION['first'] == ""){
        echo "<input value='¡Aún no configura su nombre!' disabled/>";
      }else{
        echo "<input value='" . $_SESSION['first'] ."' disabled/>";
      }
      if($_SESSION['last'] == ""){
        echo "<input value='¡Aún no configura su apellido!' disabled/>";
      }else{
        echo "<input value='" . $_SESSION['last'] ."' disabled/>";
      }
    ?>
  </div>
</div>
<div class="col-4">
  <button>
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
    <?php echo $_SESSION['email']; ?>
  </div>
</div>
<div class="col-4">
  <button>
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
    <?php echo $phone; ?>
  </div>
</div>
<div class="col-4">
  <button>
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
  <button>
    Modificar
  </button>
</div>
</div>


</div>