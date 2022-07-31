<?php
$to = $eml;
$subject = "Email Verification";
$message = '<a href="/Integradora/registration?vkey=' . $vkey . '>Register Account</a>';
$headers = "From: admin@fictichos.com \r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject,$message,$headers);
?>