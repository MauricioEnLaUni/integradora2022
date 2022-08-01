<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare('DELETE FROM `email` WHERE `em_id` = ? AND `em_us` = ? ;');
$stmt->execute([$_POST['rmv'],$_SESSION['userId']]);
header("Location:../../user.php?page=a");
?>