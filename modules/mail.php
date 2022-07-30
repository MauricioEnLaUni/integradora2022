<?php
include_once "session.php";
include_once "../../../ssl/connector.php";
$stmt = $conn->prepare("INSERT INTO `newsletter`
VALUES('',:n,:e);");
$stmt->bindParam('n',$_POST['nameMailing']);
$stmt->bindParam('e',$_POST['emailMailing']);
$stmt->execute();
header("Location:/Integradora/index.php");
?>