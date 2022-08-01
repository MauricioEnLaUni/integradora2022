<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";

if($_POST['pf'] == 1){
  $pf = 1;
}else if($_POST['pf'] == 2){
  $stmt = $conn->prepare("UPDATE `address`
  SET `ad_pf` = NULL
  WHERE `ad_us` = ?");
  $stmt->execute([$_SESSION['userId']]);
  $pf = 1;
}else $pf = 'NULL';
$stmt = $conn->prepare("INSERT INTO `address`
VALUES('',:u,:n,:s,:p,:z,:c,:t,:f);");
$stmt->bindParam('u',$_SESSION['userId']);
$stmt->bindParam('n',$_POST['nb']);
$stmt->bindParam('s',$_POST['st']);
$stmt->bindParam('p',$_POST['ps']);
$stmt->bindParam('z',$_POST['zn']);
$stmt->bindParam('c',$_POST['cy']);
$stmt->bindParam('t',$_POST['ct']);
$stmt->bindParam('f',$pf);
$stmt->execute();
header("Location:../../user.php?page=d");
?>