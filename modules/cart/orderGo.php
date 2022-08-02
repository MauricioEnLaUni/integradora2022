<?php
include_once '../../config.php';
include_once '../session.php';
include_once CONN . '/connector.php';
if($_POST['acuerdo'] == 'y'){
  $stmt = $conn->prepare('SELECT `i`.`it_in`,`i`.`it_tx`,`o`.`of_am`,`i`.`it_id`
  FROM `ITEM` AS `i`
  LEFT JOIN `OFFERS` AS `o` ON `i`.`it_of` = `o`.`of_id`
  WHERE `it_id` = ?');

  $i = 0;
  foreach($_POST['item'] as $item){
    $stmt->execute([$item['id']]);
    $out[$i] = $stmt->fetch(PDO::FETCH_ASSOC);
    $out[$i]['amount'] = $item['amount'];
    $i++;
  }
  $price = 0;
  foreach($out as $item){
    $tx = (isset($item['it_tx'])) ? $item['it_tx'] : 1;
    $ds = (isset($item['of_am'])) ? $item['of_am'] : 1;
    $price += $item['it_in'] * $item['amount'] * $tx * $ds;
  }
  if($price <= 0){
    header("Location:../../index.php?e=pay");
  }else{
    $ship = ($price > 599.99) ? 0 : ($price * .15);
    $stmt = $conn->prepare('INSERT INTO `ORDERS`
    VALUES(NULL,?,?,NULL,?,?,?,?,NULL,NULL,?);');
    if($stmt->execute([$_SESSION['userId'],$_POST['date'],$_POST['curr'],$ship,0,$price,$_POST['address']])){
      $stmt = $conn->prepare('INSERT INTO `it_or` VALUES(?,?,?);');
      foreach($out as $item){
        $stmt->execute([$conn->lastInsertId(),$item['it_id'],$item['amount']]);
      }
    }
    unset($_SESSION['cart']);
    $_SESSION['cart'] = [];
    header("Location:sale.php");
  }
} else header("Location:../../cart.php?e=agree");
?>