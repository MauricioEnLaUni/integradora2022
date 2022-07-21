<header>
    <div id="logo"></div>

    <div id="navBarButtons">
        <button id="usuario"
        data-bs-toggle="modal"
        href="#logInModal" class="topbar">
        <img src="img\svg\personOpt.svg" alt="Administración de Usuario" />
        </button>
        <button id="carrito" class="topbar">
        <img src="img\svg\cart.svg" alt="" />
        </button>
        <div id="buscar" class="topbar">
            <div class="search-bar">
                <input
                    type="search"
                    class="search-bar__input"
                    placeholder="Buscar"
                    aria-label="buscar"
                />
                <button class="search-bar__submit" aria-label="enviar búsqueda">
                    <img src="img\svg\search.svg" alt="" />
                </button>
            </div>
        </div>

        <button id="lista" onclick="sideBar('hiddenNav','shower','hider')" class="topbar">
        <img src="img\svg\list.svg" alt="" />
        </button>
    </div>
    <nav>
        <div id="acceder" class="noneBasic">
            <picture> </picture>
            <a
            class="btn btn-primary"
            data-bs-toggle="modal"
            href="#logInModal"
            role="button">
                Acceder
            </a>
        </div>
        <div id="inscribir" class="noneBasic">
            <picture> </picture>
            <a
            class="btn btn-primary"
            data-bs-toggle="modal"
            href="#logInModal2"
            role="button">
                Inscribirse
            </a>
        </div>
        <div id="hiddenNav" class="hider">
            <button onclick="location.href='iindex.html'" type="button">
                Inicio
            </button>
            <button onclick="location.href='search.html'" type="button">
                Novedades
            </button>
            <button onclick="location.href='search.html'" type="button">
                Damas
            </button>
            <button onclick="location.href='search.html'" type="button">
                Caballeros
            </button>
            <button onclick="location.href='search.html'" type="button">
                Niños
            </button>
            <button>
                <img src="img\svg\search.svg" alt=""/>
            </button>
        </div>
    </nav>
</header>