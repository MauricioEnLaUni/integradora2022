<?php
$pass = "P455w0Rd";
$hash = password_hash($pass,PASSWORD_ARGON2I);
echo "Test" . password_verify($pass,$hash);
?>