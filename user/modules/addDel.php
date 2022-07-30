<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare('DELETE FROM `address` WHERE `ad_id` = :i AND `ad_us` = :u ;');
$stmt->bindParam('i',$_GET['i']);
$stmt->bindParam('u',$_SESSION['userId']);
$stmt->execute();
header("Location:/Integradora/user/address.php");
?>