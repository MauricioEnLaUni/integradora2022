<?php
include_once '../config.php';
include_once "session.php";
include_once CONN . "/connector.php";

$stmt = $conn->prepare('SELECT COUNT(`sc_id`)
FROM `SCORE`
WHERE `sc_it` = ? AND `sc_us` = ? ;');
$stmt->execute([$_POST['id'],$_SESSION['userId']]);
$res = $stmt->fetch(PDO::FETCH_NUM);;

if($res !== NULL){
  header('Location:../exhibit.php?product=' . $_POST['id'] . '&e=already');
} else{
  $stmt = $conn->prepare("INSERT INTO `SCORE` VALUES('',?,?,?);");
  $stmt->execute([$_POST['id'],$_SESSION['userId'],$_POST['inCal']]);
}
header("Location:exhibit.php?product=" . $_POST['submit']);
?>