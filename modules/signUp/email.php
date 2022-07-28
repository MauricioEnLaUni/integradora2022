<?php


$to = $eml;
$subject = "Email Verification";
$message = '<a href="http://localhost/Integradora/registration?vkey=$vkey">Register Account</a>';
$headers = "From: admin@fictichos.com \r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject,$message,$headers);


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