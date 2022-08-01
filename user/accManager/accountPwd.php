<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
if(isset($_POST['pwd'])){
  $stmt = $conn->prepare("UPDATE `users`
  SET `us_pw` = ?
  WHERE `us_id` = ?
  LIMIT 1;");
  $hash = password_hash($_POST['pwd'],PASSWORD_ARGON2I);
  $stmt->execute([$hash,$_SESSION['userId']]);
}
header("Location:../../user.php?page=a");
?>