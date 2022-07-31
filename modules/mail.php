<?php
include_once "../config.php";
include_once ROOT . "/modules/session.php";
include_once CONN . "/connector.php";
$stmt = $conn->prepare("INSERT INTO `newsletter`
VALUES('',:n,:e);");
$stmt->bindParam('n',$_POST['nameMailing']);
$stmt->bindParam('e',$_POST['emailMailing']);
$stmt->execute();
header("Location:/Integradora/index.php");
?>