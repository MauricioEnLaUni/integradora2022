<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare("INSERT INTO `address`
VALUES('',:u,:n,:s,:p,:z,:c,:t);");
$stmt->bindParam('u',$_SESSION['userId']);
$stmt->bindParam('n',$_POST['nb']);
$stmt->bindParam('s',$_POST['st']);
$stmt->bindParam('p',$_POST['ps']);
$stmt->bindParam('z',$_POST['zn']);
$stmt->bindParam('c',$_POST['cy']);
$stmt->bindParam('t',$_POST['ct']);
$stmt->execute();
header("Location:/Integradora/user/address.php");
?>