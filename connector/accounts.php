<?php
switch($_SESSION['user']){
	case 0:
		$usr = "fictichos_admin";
		$pwd = "55Mn7c0WOtJtidL9Fg3c5UPkB2yXt0JI";
		break;
	case 1:
		$usr = "utagsEvaluacion";
		$pwd = "4TlqciY1V30SXj1j0vc76Y6Ax54FcRmU";
		break;
	case 2: 
		$usr = "ficticho_loggedUser";
		$pwd = "C5i27blu4GB11hDKpTqQpgi95aRWDZFn";
		break;
	case 3:
		$usr = "ficticho_client";
		$pwd = "0fJ9ff4DWHNrG0OKjhLLvuCOFQTPKELk";
		break;
	default:
		$usr = "ficticho_user";
		$pwd = "6dvYlNfw28lz6j5ITX47e67cEdAJb3nm";
		break;
}
$host = "localhost";
$db = "fict";
?>