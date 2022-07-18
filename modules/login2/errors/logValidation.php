<?php
require_once "modules/session.php";
if(submitError()||
        emptyError()||
        userValidation()||
        emailValidation()||
        passwordValidation()
){
}
?>