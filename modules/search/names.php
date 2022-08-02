<?php
$txt = [];
$stmt = $conn->prepare("SELECT `it_id`
                        FROM `ITEM`
                        WHERE `it_nm` LIKE ?;");
if(!isset($_GET['searchText'])) $tx = "%%";
else $tx = "%" . $_GET['searchText'] . "%";
getSearch($stmt,$tx,$txt);
?>