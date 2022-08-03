<?php
  include_once "config.php";
  require_once "modules/session.php";
  include_once CONN . '/connector.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/about.css">
    <title>Fictichos</title>
    <?php
      include_once 'modules/meta/stylesheets.php';
    ?>
    <link
    rel="shortcut icon"
    href="img/logo/favicon.ico"
    type="image/x-icon"
    />
  </head>

  <body>
    <?php
      include_once 'modules/modal.php';
    ?>
    <header>
      <?php include_once 'modules/header.php'; ?>
    </header>
    <div class="content-wrapper">x
      <main>
        <div class="row hero"></div>
        <div class="row mt-5 mb-3">
          <div class="col-md-3 col-sm-1 d-none d-sm-flex"></div>
          <div class="col-md-6 col-sm-10 col-12">
            <h1 id="abouTtitle" class="text-center blueU">Fictichos</h1>
            <section class="text-center blueU">
            <h3 id="sub1">Nuestra historia</h3>
                    <p>En la actualidad, Fictichos llega a millones de hogares de todo el pais,
                    pero, ¿Sabias que Fictichos era una pequeño negocio en aguascalientes,
                    que venia calzado en un pequeño local? Asi es como un pequeño puesto se 
                    convirtio en lo que hoy es y representa Fictichos.</p>
                <h3 id="sub2">Nuestros valores</h3>
                    <p>Honestidad, Transparencia, Pasión, Calidad, Responsabilidad social y colaboración.</p>
                <h3 id="sub3">100% Hidrocalidos</h3>
                    <p>En fictichos nos complace decir que todas nuestras operaciones y las personas asociadas
                    a la empresa son del estado de Aguascalientes, desde el día en que fictichos nació las y los
                    aguascalentenses lo han sido todo para el desarrollo de la empresa, por lo que nos enfocáremos en 
                    traer la máxima calidad y comodidad. De y para las personas hidrocálidas.</p>
                <h3 id="sub4">Misión</h3>
                    <p>En Fictichos nuestra misión es ofrecer un servicio cordial, ágil, informativo en el sistema de ventas
                    para que toda persona pueda tener calzado en el dia a dia.</p>
                <h3 id="sub5">Visión</h3>
                    <p>Ser una empresa líder de Venta por de calzado que contribuya al desarrollo de nuestros: Clientes,
                    Colaboradores, Proveedores, Autoridades, Accionistas. para nuestro bienestar económico y desarrollo social.</p>
            <h2>Equipo de desarrollo</h2>
                <h3 id="sub11">Historia</h3>
                    <p>Nuestro grupo se formó a partir de la solicitud de un proyecto en 2022 donde los 5 miembros 
                        se unieron como un equipo de desarrollo para la creación de la página web.
                    </p>
                <h3 id="sub22">Valores</h3>
                    <p>Nuestra pasión por lo que hacemos nos lleva a buscar siempre los mejores resultados, un alto compromiso
                        con los proyectos en los que participamos. Como equipo, tenemos un enfoque del trabajo simple
                        y ágil. se une a una actitud de mente abierta para escuchar las necesidades del cliente y hacer realidad
                        su visión. Aceptamos la innovación en nuestras soluciones tecnológicas con precisión, equilibrio y coherencia.
                        confianza en nuestras relaciones comerciales y fomentamos activamente un clima de ética laboral, integridad, honor y transparencia.</p>
                <h3 id="sub33">Misión</h3>
                    <p>La pasión por la tecnología y el compromiso de ofrecer la más alta calidad en nuestro servicio.
                        Como desarrolladores de software y soluciones tecnológicas, nos esforzamos por involucrarnos,
                        nuestro objetivo es lograr la máxima satisfacción de nuestros clientes y usuarios, a través
                        de un enfoque de trabajo basado en la razón, sentido común, sostenibilidad, 
                        eficacia, alto valor añadido y la mejora continua.</p>
                <h3 id="sub55">Visión</h3>
                    <p>Crear, trabajar y vivir con tecnologías que permitan organizar de manera eficiente,
                        equilibrada y equitativa todo el mundo. Las miembros son lo que importa y lo que hace que nuestro
                        equipo tenga éxito. El futuro que vislumbramos se compone de una sociedad equilibrada y basada en la razón,
                        que hace uso de las tecnologías para conseguir la máxima sostenibilidad, eficacia y confort.</p>
        </section>
          </div>
          <div class="col-md-3 col-sm-1 d-none d-sm-flex"></div>
          </div>
          <div class="row" id="autor">
            <?php
            $equipo = [
              0=>['Victor','210727','img/about/1.jpg','victor cara','rol'],
              1=>['Hector','210711','img/about/2.jpg','hector cara','rol'],
              2=>['Mauricio','210727','img/about/3.jpg','mauricio cara','rol'],
              3=>['Enrique','211026','img/about/4.jpg','enrique cara','rol'],
              4=>['Cesar','210727','img/about/5.jpg','cesar cara','rol']
            ];
            foreach($equipo as $r){
              include "modules/about/card.php";
            }
            ?>
          </div>
      </main>
      <footer></footer>
      <?php
        include_once 'modules/footer.php';
        include_once 'modules/meta/scripts.html';
        echo '<script>
        picture("logo","img/logo/Fictichos.png","img/logo/bigF.png",
        "img/logo/Fictichos.png","Logo Test");
        </script>';
      ?>
    </div>
  </body>
</html>