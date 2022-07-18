<?php
switch($_SESSION['user']){
	case 0:
		$user = "fictichos_admin";
		$pwd = "55Mn7c0WOtJtidL9Fg3c5UPkB2yXt0JI";
		break;
	case 1:
		$user = "utagsEvaluacion";
		$pwd = "4TlqciY1V30SXj1j0vc76Y6Ax54FcRmU";
		break;
	case 2: 
		$user = "ficticho_loggedUser";
		$pwd = "C5i27blu4GB11hDKpTqQpgi95aRWDZFn";
		break;
	case 3:
		$user = "ficticho_client";
		$pwd = "0fJ9ff4DWHNrG0OKjhLLvuCOFQTPKELk";
		break;
	default:
		$user = "ficticho_user";
		$pwd = "6dvYlNfw28lz6j5ITX47e67cEdAJb3nm";
		break;
}
$host = "localhost";
$db = "fictichos_int";


password_hash('rammus',PASSWORD_ARGON2I);
if(isset($_POST['usuario']) &&
    isset($_POST['password']) &&
    isset($_POST['email']) &&
    $_POST['repeat'] == $_POST['password']){
    if(!filter_var($_POST['email'])){
        // Sends user back and returns email as validation error
        header("location:$back?valError=email");
        exit();
    }else{
        $eml = $_POST['email'];
    }
    if(!preg_match("/^[a-zA-Z0-9]*$/",'usuario')){
        header("location:" . $_SESSION['back'] . "?valError=usuario");
        exit();
    }else{
        $usr = $_POST['usuario'];
    }
    $pwd = $_POST['password'];
}
?>