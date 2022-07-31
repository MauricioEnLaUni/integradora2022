<?php
if(isset($_GET['vkey'])){
  $vkey = $_GET['vkey'];
  $stmt = $conn->prepare("SELECT `verified`,`vkey`
                          FROM `users`
                          WHERE `verified` = 0 AND `vkey` = '$vkey'
                          LIMIT 1;");
  $result = $stmt->execute([$vkey]);
  if($result->num_rows == 1){
    $stmt = $conn->prepare("UPDATE `users`
                            SET `verified` = 1
                            WHERE `vkey` = '$vkey'
                            LIMIT 1;");
    $stmt->execute([$vkey]);
  }
}else{
  die("Something went wrong.");
}
?>