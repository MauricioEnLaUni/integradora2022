<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare('DELETE FROM `phone` WHERE `ph_id` = ? AND `ph_us` = ? ;');
$stmt->execute([$_POST['rmv'],$_SESSION['userId']]);
header("Location:../../user.php?page=a");
?>