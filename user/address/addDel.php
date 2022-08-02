<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare('DELETE FROM `ADDRESS` WHERE `ad_id` = ? AND `ad_us` = ? ;');
$stmt->execute([$_GET['i'],$_SESSION['userId']]);
header("Location:../../user.php?page=d");
?>