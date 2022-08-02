<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
if(isset($_POST['display'])){
  $stmt = $conn->prepare("UPDATE `USERS`
  SET `us_dn` = :d
  WHERE `us_id` = :u
  LIMIT 1;");
  $stmt->bindParam('d',$_POST['display']);
  $stmt->bindParam('u',$_SESSION['userId']);
  $stmt->execute();
}
if(isset($_POST['first'])){
  $stmt = $conn->prepare("UPDATE `USERS`
  SET `us_nm` = :n
  WHERE `us_id` = :u
  LIMIT 1;");
  $stmt->bindParam('n',$_POST['first']);
  $stmt->bindParam('u',$_SESSION['userId']);
  $stmt->execute();
}
if(isset($_POST['last'])){
  $stmt = $conn->prepare("UPDATE `USERS`
  SET `us_ln` = :l
  WHERE `us_id` = :u
  LIMIT 1;");
  $stmt->bindParam('l',$_POST['last']);
  $stmt->bindParam('u',$_SESSION['userId']);
  $stmt->execute();
}
header("Location:../../user.php?page=a");
?>