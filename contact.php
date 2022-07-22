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
</head>
<body class="bodyq">
    <?php
        include_once "modules/header.php";
        include_once "modules/modal.php";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 mt-4">
                <p class="h3 text-center">
                    ¡Contáctanos!
                </p>
                <form action="">
                    <fieldset>
                        <label class="col-12 col-md-5">
                            <p class="h5">Nombre</p>
                            <input
                            type="text"
                            class="inputContact"
                            name="nombre"
                            placeholder="Nombre"
                            required
                            />
                        </label>
                        <label class="col-12 col-md-5">
                            <p class="h3">Apellido</p>
                            <input
                            type="text"
                            class="inputContact"
                            name="apellido"
                            placeholder="Apellido"
                            required
                            />
                        </label>
                        <label class="col-12 flex-fill mt-3">
                            <p class="h3">Email</p>
                            <input
                            type="email"
                            class="inputContact"
                            name="mail"
                            placeholder="Email"
                            required
                            />
                        </label>
                        <label class="col-12 flex-fill mt-3">
                            <p class="h3">Asunto</p>
                            <select
                            name="asunto"
                            class="inputContact"
                            >
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </label>
                        <label class="col-12 flex-fill mt-3">
                            <p class="h3">Teléfono</p>
                            <input
                            type="phone"
                            name="phone"
                            class="inputContact"
                            placeholder="Teléfono"
                            />
                        </label>
                    </fieldset>
                </form>
            </div>
           
            <div class="d-none d-md-block col-md-7">
                <p>
                    This is some test.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3 center">
                <label>
                    <p class="h3 mt-3">
                        Mensaje:
                    </p>
                    <textarea
                    name="mensaje" 
                    cols="60"
                    class="inputContact"
                    rows="12"
                    form=""
                    placeholder="Escriba aquí su mensaje... "
                    required></textarea>
                    </label>
                        <button type="submit" class="btn btn-info " name="submit">
                        Enviar
                        </button>
                        <button type="reset" class="btn btn-secondary ">
                        Reestablecer
                        </button>
            </div>
            <div class="col-md-4 mt-3">
                <p class="h3">
                    Atención en Sucursal:
                </p>
                <p class="h5">
                    Horarios:<br />
                    &emsp;Lunes a Viernes de 9:00 a 17:00<br />
                    &emsp;Sábado de 10:00 a 15:00<br />
                </p>
                <div id="map">
                    <img src="img/placeholderRat.jpg" alt="" width=100%>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <p class="h3">
                    Teléfonos
                </p>
                <p class="h5 mt-2">
                    (+52) 449 967-24-81
                </p>
            </div>
        </div>
    </div>
    <?php
        include_once "modules/footer.php";
    ?>
    <script src="js/one.js">

    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
        defer
      ></script>
      <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
></script>
</body>