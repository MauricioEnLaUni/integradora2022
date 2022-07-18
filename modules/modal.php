<div
class="modal fade"
id="logInModal"
aria-hidden="true"
aria-labelledby="logInModalLabel"
tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="modal-header justify-content-around">
                    <!-- Change active class accordingly -->
                    <button
                    class="btn btn-primary"
                    data-bs-target="#logInModal">
                        Acceder
                    </button>
                    <button
                    class="btn btn-primary"
                    data-bs-target="#logInModal2"
                    data-bs-toggle="modal">
                        Inscribirse
                    </button>
                </div>
                <div class="modal-content">
                    <p class="h1 text-center">
                        Ingresar
                    </p>
                    <form
                    class="mt-3 mx-4"
                    action="back.php"
                    method="POST">
                        <fieldset class="mb-3">
                            <label class="row">
                                <p class="h5">
                                    Cuenta de Usuario
                                </p>
                                <input
                                type="text"
                                name="usuario"
                                maxlength="16"
                                />
                            </label>
                            <label class="row">
                                <p class="h5">
                                    Password
                                </p>
                                <input
                                type="password"
                                name="password"
                                maxlength="60"
                                />
                            </label>
                            <div class="row justify-content-around mx-4">
                                <button
                                type="submit"
                                name="submit"
                                class="btn btn-primary mt-3 col-6">
                                    Enviar
                                </button>
                                <button
                                type="reset"
                                class="btn btn-primary mt-3 col-6">
                                    Reestablecer
                                </button>
                            </div>
                            <div class="row">
                                <p class="col-8 mt-2">
                                    ¿Olvidó su 
                                    <a href="forgotPassword">
                                        contraseña?
                                    </a>
                                </p>
                                <button
                                type="button"
                                class="btn btn-danger col-2 mt-4"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                                    <p class="h5">Cerrar</p>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"
id="logInModal2"
aria-hidden="true"
aria-labelledby="logInModalLabel2"
tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="modal-header">
                    <!-- Change active class accordingly -->
                    <button
                    class="btn btn-primary"
                    data-bs-target="#logInModal"
                    data-bs-toggle="modal">
                        Acceder
                    </button>
                    <button
                    class="btn btn-primary"
                    data-bs-target="#logInModal2">
                        Inscribirse
                    </button>
                </div>
                <div class="modal-content">
                    <p class="h1 text-center">
                        Inscribirse
                    </p>
                    <form
                    class="mt-3 mx-4"
                    action="back.php"
                    method="POST">
                        <fieldset class="mb-3">
                            <label class="row">
                                <p class="h5">
                                    Cuenta de Usuario
                                </p>
                                <input
                                type="text"
                                name="usuario"
                                maxlength="16"
                                />
                            </label>
                            <label class="row">
                                <p class="h5">
                                    Nombre de Usuario
                                </p>
                                <input
                                type="text"
                                name="display"
                                maxlength="32"
                                />
                            </label>
                            <label class="row">
                                <p class="h5">
                                    Email
                                </p>
                                <input
                                type="email"
                                name="email"
                                maxlength="60"
                                />
                            </label>
                            <label class="row">
                                <p class="h5">
                                    Password
                                </p>
                                <input
                                type="password"
                                name="password"
                                maxlength="60"
                                />
                            </label>
                            <label class="row">
                                <p class="h5">
                                    Repita su password
                                </p>
                                <input
                                type="password"
                                name="repeat"
                                maxlength="60"
                                />
                            </label>
                            <div class="row justify-content-around mx-3">
                                <button
                                type="submit"
                                name="submit"
                                class="btn btn-primary mt-3 col-5">
                                    Enviar
                                </button>
                                <button
                                type="reset"
                                class="btn btn-primary mt-3 col-5">
                                    Reestablecer
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-8"></div>
                                <button
                                type="button"
                                class="btn btn-danger col-2 mt-3"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                                    <p class="h5">Cerrar</p>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>