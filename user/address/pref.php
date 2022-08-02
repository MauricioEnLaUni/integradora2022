<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";

// Clears other preferred
$stmt = $conn->prepare("UPDATE `ADDRESS`
SET `ad_pf` = NULL
WHERE `ad_us` = ?");
$stmt->execute([$_SESSION['userId']]);

// Makes the selected into preferred
$stmt = $conn->prepare('UPDATE `ADDRESS`
SET `ad_pf` = 1
WHERE `ad_us` = ? AND `ad_id` = ? ;' );
$stmt->execute([$_SESSION['userId'],$_POST['pf']]);

// Returns to Address
header("Location:../../user.php?page=d");
?>