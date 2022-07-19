<?php
require_once "../session.php";
require_once "validation.php";
require_once "../../../../ssl/connector.php";
$eml = 'one@two';
echo emailValidation($eml);
?>