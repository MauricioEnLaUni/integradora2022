<?php
$to = $eml;
$subject = "Email Verification";
$message = '
¡Bienvenido a la tienda de calzado Fictichos! <br />
Utilice el vínculo siguiente para confirmar su correo electrónico y poder empezar a utilizar todas las características del sitio web. <br />
<a href="email.php?vkey=' . $vkey . '>Register Account</a>
Una vez más agradecemos su preferencia.
$emsp;-Admin';
$headers = "From: admin@fictichos.com \r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject,$message,$headers);
?>