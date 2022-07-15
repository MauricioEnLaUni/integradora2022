<?php
function empty_error($ur,$sw,$rp,$em){
    $result;
    if(empty($ur) || empty($sw) || empty($rp) || empty($em))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
}
function invalidUser($ur,$dbc){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$ur))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    $sql = 'SELECT * FROM `ussers` WHERE `name` = ?;';
    $stmt = mysqli_stmt_init($dbc);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: next.php");
        exit();
    }
    mysqli_stmt_bind_parameter($stmt,"s",$ur);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function invalidEmail($em,$dbc){
    $result;
    if(!filter_var($em,FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
}
function repeatPassword($sw,$rp){
    $result;
    if($sw !== $rp)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
}

function logMe($ur,$sw,$em)
{
    $sql = 'INSERT INTO `ussers`(`name`,`email`,`password`) VALUES(?,?,?);';
    $stmt = mysqli_stmt_init($dbc);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: next.php",PASSWORD_BCRYPT);
        exit();
    }
    $hashedPwd = password_hash($sw);
    mysqli_stmt_bind_parameter($stmt,"sss",$ur,$em,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: next.php");
}
?>