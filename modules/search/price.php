<?php
// Price query between min and max
$stmt = $conn->prepare('SELECT `it_id`
                    FROM `ITEM`
                    WHERE `it_in` BETWEEN ? AND ?;');

// Defaults if not set
$min = (isset($_GET['minNumber'])) ? $_GET['minNumber'] : 150;
$max = (isset($_GET['maxNumber'])) ? $_GET['maxNumber'] : 2999;


$stmt->execute([$min,$max]);
$result = $stmt->fetchAll(PDO::FETCH_NUM);
foreach($result as $row){
  $minmax[] = $row[0];
}
?>