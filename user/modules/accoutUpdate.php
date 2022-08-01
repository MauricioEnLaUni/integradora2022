<?php
$stmt = $conn->prepare("UPDATE `phone`
SET `ph_nm` = ?
WHERE `ph_nm` = ? AND `ph_us` = ?
LIMIT 1;");
foreach($_POST['phone'] as $ph){
  $new = $ph;
  next($ph);
  $old = $ph;
  $stmt->execute([$new,$old,$_SESSION['userId']]);
}
if(isset($_POST['pwd'])){
  $stmt = $conn->prepare("UPDATE `users`
  SET `us_pw` = '?'
  WHERE `us_pw` = ?
  LIMIT 1;");
  $hash = password_hash($_POST['pwd'],PASSWORD_ARGON2I);
  $stmt->execute([$hash,$_SESSION['userId']]);
}
header("Location:/Integradora/user/account.php");
?>