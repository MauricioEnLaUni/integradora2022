<?php
include_once '../config.php';
include_once "session.php";
include_once CONN . "/connector.php";

$stmt = $conn->prepare('SELECT COUNT(`sc_us`)
FROM `SCORE`
WHERE `sc_us` = ? AND `sc_it` = ?;');
$stmt->execute([$_SESSION['userId'],$_POST['submit']]);
$result = $stmt->fetchColumn();
if($result != 0){
  $stmt = $conn->prepare("INSERT INTO `SCORE` VALUES('',?,?,?);");
  $stmt->execute([$_POST['submit'],$_SESSION['userId'],$_POST['inCal']]);
}
header("Location:exhibit.php?product=" . $_POST['submit']);
?>