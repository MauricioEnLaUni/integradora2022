<header>
    <div id="logo"></div>

    <div id="navBarButtons">
        <button id="usuario" onclick="appear('formaUsuario')" class="topbar">
        <img src="..\img\svg\personOpt.svg" alt="Administración de Usuario" />
        </button>
        <button id="carrito" class="topbar">
        <img src="..\img\svg\cart.svg" alt="" />
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
                    <img src="..\img\svg\search.svg" alt="" />
                </button>
                </div>
            </div>

        <button id="lista" onclick="sideBar('hiddenNav','shower','hider')" class="topbar">
        <img src="..\img\svg\list.svg" alt="" />
        </button>
    </div>
    <!-- Can be implemented with a Bootstrap modal -->
    <!-- User LogIn start -->
    <form
        action=""
        method="post"
        class="ingreso"
        id="formaUsuario"
        style="display: none"
    >
        <div id="formStyle">
        <div id="gridUser">
            <label for="usrForm" class="flexUsrMinor">Cuenta</label>
            <input
            type="text"
            name="usuario"
            id="entradaUsuario"
            class="flexUsr usrInput"
            maxlength="16"
            />
            <label for="password" class="flexUsrMinor">Contraseña</label>
            <input
            type="password"
            name="contraseña"
            id="entradaContraseña"
            maxlength="60"
            class="flexUsr usrInput"
            />
            <input
            type="submit"
            value="Ingresar"
            class="flexUsrMinor usrButton"
            />
            <input
            type="reset"
            value="Limpiar"
            class="flexUsrMinor usrButton"
            />
        </div>
        </div>
    </form>
    <!-- User LogIn END -->
    <!-- End of User log in -->
    
    <nav>
        <div id="acceder" class="noneBasic">
            <picture> </picture>
            <p>Acceder</p>
        </div>
        <div id="inscribir" class="noneBasic">
            <picture> </picture>
            <p>Inscribirse</p>
        </div>
        <div id="noneBasic">
            <div id="acceder">

            </div>
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