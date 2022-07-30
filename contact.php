<?php
include_once "modules/session.php";
include_once "../../ssl/connector.php";
if(isset($_POST['submit'])){
  $stmt = $conn->prepare("INSERT INTO `contact`
  VALUES('',:u,:l,:e,:s,:p,:m)");
  $stmt->bindParam('u',$_POST['nombre']);
  $stmt->bindParam('l',$_POST['apellido']);
  $stmt->bindParam('e',$_POST['email']);
  $stmt->bindParam('s',$_POST['issue']);
  $stmt->bindParam('p',$_POST['phone']);
  $stmt->bindParam('m',$_POST['msg']);
  $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adf.css">
    <title>Fictichos</title>
    <?php
        include_once "modules/meta/stylesheets.php";
    ?>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body class="bodyq">
  <header>
    <?php
      include_once "modules/session.php";
      include_once "modules/header.php";
    ?>
  </header>
    
<?php
  include_once "modules/modal.php";
?>
<main>
<div class="container">
  <div class="row">
    <div class="col-12 col-md-4 mt-4">
      <p class="h3 text-center">
        ¡Contáctanos!
      </p>
      <form action="contact.php?fb=true" method="post" id="contactForm">
        <fieldset>
          <label class="col-12 col-md-5">
            <p class="h4">
              Nombre
            </p>
            <input type="text" class="inputContact" name="nombre" placeholder="Nombre" required>
          </label>
          <label class="col-12 col-md-6">
            <p class="h4">
              Apellidos
            </p>
            <input type="text" class="inputContact" name="apellido" placeholder="Apellidos" required>
          </label>
          <label class="col-12 flex-fill mt-3">
            <p class="h4">
              Email
            </p>
            <input type="email" class="inputContact" name="email" placeholder="Email" required>
          </label>
          <label class="col-12 flex-fill mt-3">
            <p class="h4">
              Asunto
            </p>
            <select name="issue" id="issue" class="inputContact" required>
              <option value="0">Información de Órden</option>
              <option value="1">Información sobre pagos</option>
              <option value="2">Información de producto</option>
              <option value="3">Otro</option>
            </select>
          </label>
          <label class="col-12 flex-fill mt-3">
            <p class="h4">Teléfono</p>
            <input type="tel" name="phone" class="inputContact" placeholder="Teléfono">
          </label>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="d-none d-md-block col-md-7"></div>
  <div class="row">
    <div class="col-md-4 mb-3 text-center">
      <label>
        <p class="h3 mt-3">
          Mensaje:
        </p>
        <textarea name="msg" id="msgContact" cols="40" rows="12" form="contactForm" placeholder="Escriba su mensaje aquí..." required></textarea>
      </label>
      <button type="submit" class="btn btn-info" name="submit" form="contactForm">
        Enviar
      </button>
      <button type="reset" class="btn btn-secondary" form="contactForm">
        Reestablecer
      </button>
    </div>
    <div class="col-md-4 mt-3">
      <p class="h3">Teléfonos</p>
      <p class="h5 mt-2">(+52) 449 967-24-81</p>
    </div>
    <div class="col-md-4 mt-3">
      <p class="h3">Atención en Sucursal:</p>
      <p class="h5">
        Horarios:<br />
        &emsp;Lunes a Viernes de 9:00 a 17:00<br />
        &emsp;Sábado de 10:00 a 15:00<br />
      </p>
      <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14813.852934505318!2d-102.36211091279982!3d21.839660728642755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429eb8c66ba4c57%3A0x800a85fa04315af2!2sTechnologic%20University%20of%20Aguascalientes!5e0!3m2!1sen!2smx!4v1659152353507!5m2!1sen!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
</main>
<?php
  include_once "modules/footer.php";
?>
<script src="js/one.js">
</script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
  crossorigin="anonymous"
></script>
</body