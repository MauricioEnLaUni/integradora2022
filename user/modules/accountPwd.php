<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
if(isset($_POST['pwd'])){
  $stmt = $conn->prepare("UPDATE `users`
  SET `us_pw` = :p
  WHERE `us_id` = :u
  LIMIT 1;");
  $hash = password_hash($_POST['pwd'],PASSWORD_ARGON2I);
  $stmt->bindParam('p',$hash);
  $stmt->bindParam('u',$_SESSION['userId']);
  $stmt->execute();
}
header("Location:/Integradora/user/account.php");
?>