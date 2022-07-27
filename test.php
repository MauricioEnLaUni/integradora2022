<?php
$stmt = $conn->prepare("SELECT `it_id`
                        FROM `item`
                        WHERE `it_nm` LIKE ?;");
$stmt->execute([$nm]);
$result = $stmt->fetch(PDO::FETCH_NUM);
$fill[] = $result[0];

if($of !== false){
  $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_of` IS NOT NULL;');
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_NUM);

  foreach($result as $row){
    $fill[] = $row[0];
  }
}

$stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_id` IN (
                          SELECT `sc_it`
                          FROM `score`
                          HAVING AVG(`sc_se`) >= ?
                        );');
$stmt->execute([$sc]);
$result = $stmt->fetchAll(PDO::FETCH_NUM);
foreach($result as $row){
  $fill[] = $row[0];
}

$stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_ot` BETWEEN ? AND ?;');
$stmt->execute([$min,$max]);
$result = $stmt->fetchAll(PDO::FETCH_NUM);
foreach($result as $row){
  $fill[] = $row[0];
}

$stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_tp` = ?;');
foreach($st as $row){
  if($row != ""){
    $stmt->execute([$row]);
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($result as $row){
      $fill[] = $row[0];
    }
  }
}

$stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_br` = ?;');
foreach($br as $row){
  if($row != ""){
    $stmt->execute([$row]);
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($result as $row){
      $fill[] = $row[0];
    }
  }
}

$stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_wh` = ?;');
foreach($gn as $row){
  if($row != ""){
    $stmt->execute([$row]);
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($result as $row){
      $fill[] = $row[0];
    }
  }
}

$stmt = $conn->prepare('SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
                        FROM `item`
                        WHERE `it_id` = :i;');
$stmt->bindParam('i',$i);
$fill = array_unique($fill);
foreach($fill as $i){
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  }
}
?>