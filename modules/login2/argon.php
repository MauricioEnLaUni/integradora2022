<?php
session_start();
$_SESSION['back'] = "argon.php";

echo "Test: " . password_hash('他是胡说八道',PASSWORD_ARGON2I);
$retur = password_hash('他是胡说八道',PASSWORD_ARGON2I);
echo "Test: " . password_verify('他是胡说八道',$retur);

echo "<a href='" . $_SESSION["back"] . "'>Press Me</a>";
?>