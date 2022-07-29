<div class="container-fluid g-0">
  <div class="row">
    <div class="col-md-2 col-2 g-0" id="logoCont">
      <a href="index.php">
        <div id="logo"></div>
      </a>
    </div>
    <nav class="d-md-block col-10 g-0">
      <div class="row flex-md-row-reverse g-0">
        <div id="hButtons" class="d-md-none d-flex row justify-content-around">
          <button
          class="btn btn-primary d-md-none col-3 d-flex"
          type="button"
          data-bs-toggle="modal"
          role="button"
          href="#logInModal2">
            <img src="img/svg/personFill.svg" alt="" />
          </button>
          <button
          class="btn btn-primary d-md-none col-3 d-flex"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvas"
          aria-controls="offcanvas">
            <img src="img/svg/list.svg" alt="" />
          </button>
          <button
          class="btn btn-primary d-md-none col-3 d-flex"
          type="button"
          data-bs-toggle="modal"
          role="button"
          href="#searchModal">
            <img src="img/svg/search.svg" alt="" />
          </button>
          <button
          class="btn btn-primary d-md-none col-3 d-flex"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasScrolling"
          aria-controls="offcanvasScrolling">
            <img src="img/svg/list.svg" alt="" />
          </button>
        </div>
        <div class="d-none d-md-block col-md-5 flex-row-reverse">
          <?php
          if($_SESSION['user'] != 4) include_once "C:/xampp/htdocs/Integradora/modules/header/logged.php";
          else include_once "C:/xampp/htdocs/Integradora/modules/header/logIn.php";
          ?>
        </div>
        <div class="search-bar col-md-4 d-none d-md-block">
          <input
              type="search"
              class="search-bar__input"
              placeholder="Buscar"
              aria-label="buscar"
          />
          <button type="submit" class="search-bar__submit" aria-label="enviar búsqueda">
              <img src="img/svg/search.svg" alt="" />
          </button>
        </div>
      </div>
      <div class="row d-none d-md-flex text-center navBCont g-0">
        <a class="navButtons col-md-3" href="index.php">
          INICIO
        </a>
        <a class="navButtons col-md-3" href="search.php">
          NOVEDADES
        </a>
        <a class="navButtons col-md-3" href="about.php">
          NOSOTROS
        </a>
        <a class="navButtons col-md-3" href="contact.php">
          CONTACTO
        </a>
      </div>
    </nav>
  </div>
</div>
<div
class="offcanvas offcanvas-end g-0 d-md-none"
data-bs-scroll="true"
data-bs-backdrop="false"
tabindex="-1"
id="offcanvasScrolling"
aria-labelledby="offcanvasScrollingLabel"
>
<div class="offcanvas-header">
  <button
  type="button"
  class="btn-close"
  data-bs-dismiss="offcanvas"
  aria-label="Close">
  </button>
</div>
<div class="offcanvas-body row text-center navBCont g-0">
  <ul>
    <li><a href="" class="navList">INICIO</a></li>
    <li><a href="" class="navList">NOVEDADES</a></li>
    <li><a href="" class="navList">NOSOTROS</a></li>
    <li><a href="" class="navList">CONTACTO</a></li>
  </ul>
</div>
</div>