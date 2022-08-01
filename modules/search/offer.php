<?php
if($_GET['offer'] != 'on') $off = $full;
else {
  $stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_of` IS NOT NULL;');
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_NUM);
  foreach($result as $o){
    $off[] = $o[0];
  }
}
?>