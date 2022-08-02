<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare("INSERT INTO `PHONE`
VALUES(NULL,?,?);");
$stmt->execute([$_SESSION['userId'],$_POST['inPh']]);
header("Location:../../user.php?page=a");
?>