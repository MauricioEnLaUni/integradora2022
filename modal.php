<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/modal.css">
    <title>Document</title>
</head>
<body>
    <!-- <div class="modal fade"
id="logInModal2"
aria-hidden="true"
aria-labelledby="logInModalLabel2"
tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="modal-header"> -->
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
                                class="bttn"
                                data-bs-target="#logInModal2"
                                data-bs-toggle="modal">
                                    Inscribirse
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="">
                    <p class="h1 text-center">
                        Ingresar
                    </p>
                    <form
                    class="mt-3 mx-4"
                    action="logValidate.php"
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
                            <div class="row justify-content-around mx-4 pt-2">
                                
                                <button
                                id="btnenv"
                                type="submit"
                                name="submit"
                                class="bttn">
                                    Enviar
                                </button>
                            </div>
                            <div class="row">
                                <p class="col-8 mt-2" id="osc">
                                    ¿Olvidó su 
                                    <a href="forgotPassword">
                                        contraseña?
                                    </a>
                                </p>
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
                <div class="modal-header justify-content-around">
                    <!-- Change active class accordingly -->
                    <button
                    id="btn"
                    class="bttn btn btn-primary"
                    data-bs-target="#logInModal"
                    data-bs-toggle="modal">
                        Acceder
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-content">
                    <p class="h1 text-center">
                        Inscribirse
                    </p>
                    <div class="row row justify-content-around mx-3">
                        <div class="col-md-6">
                    <form
                    class="mt-3 mx-2"
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
                            <label class="row mt-2">
                                <p class="h5">
                                    Nombre de Usuario
                                </p>
                                <input
                                type="text"
                                name="display"
                                maxlength="32"
                                />
                            </label>
                            </div>
                            <div class="col-md-5">
                            <label class="row pt-3">
                                <p class="h5">
                                    Password
                                </p>
                                <input
                                type="password"
                                name="password"
                                maxlength="60"
                                />
                            </label>
                            <label class="row mt-2">
                                <p class="h5">
                                    Repetir contaseña
                                </p>
                                <input
                                type="password"
                                name="repeat"
                                maxlength="60"
                                />
                            </label>
                            </div>
                            <div class="col-md-10">
                            <label class="row">
                                <p class="h5">
                                    Email
                                </p>
                                <input
                                type="email"
                                name="email"
                                maxlength="60"
                                />
                                </div>
                                </div>
                            </label>
                            <div class="row justify-content-around mx-3">
                                <button
                                type="submit"
                                name="submit"
                                class="bttn btn btn-primary my-3 col-5">
                                    Enviar
                                </button>
                                <button
                                type="reset"
                                class="bttn btn btn-primary my-3 col-5">
                                    Reestablecer
                                </button>
                            </div>
                            
                    </div>
                                <div class="col-8"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>