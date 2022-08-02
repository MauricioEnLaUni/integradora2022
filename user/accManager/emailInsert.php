<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare("INSERT INTO `email`
VALUES(NULL,?,?);");
$stmt->execute([$_SESSION['userId'],$_POST['inEm']]);
header("Location:../../user.php?page=a");
?>