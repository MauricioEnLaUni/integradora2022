<?php
// Validates that inputs come from the Submit button
function submitError($sbm,$user,$pass,&$usr,&$pwd){
    $result;
    if(isset($sbm)){
        $usr = $user;
        $pwd = $pass;
        $result = false;
        return $result;
    }else{
        $result = true;
        return $result;
    }
}

function emptyError($usr,$pwd){
    $result;
    if(empty($usr) || empty($pwd)){
        $result = false;
        return $result;
    }else{
        $result = true;
        return $result;
    }
}

function userValidation($usr){
    if(!preg_match("/^[a-zA-Z0-9]*$/",$usr)){
        $result = true;
        return $result;
    }else{
        $result = false;
        return $result;
    }
}

function newUser($usr,$dbc){
    $temp = $usr;
    $stmt = mysqli_prepare($dbc,'SELECT `us_an` FROM `USERS` WHERE `us_an` = ?;');
    mysqli_stmt_bind_param($stmt,"s",$usr);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $result;
    while($row = mysqli_fetch_assoc($resultData)){
        if($row['us_an'] == $usr){
            $result = false;
        }
    }
    if(!isset($result)){
        $result = true;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function emailValidation($eml,$dbc){
    $result;
    if(!filter_var($eml,FILTER_VALIDATE_EMAIL))
    {
        $result = false;
        return $return;
    }else{
        $result = true;
        return $return;
    }
}

function newEmail(){
    $sql = 'SELECT `em_us` FROM `EMAIL` WHERE `em_us` = ?;';
    $stmt = mysqli_stmt_init($dbc);
    
    mysql_stmt_bind_param($stmt,"s",$eml);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        $result = $resultData;
        return $result;
    }else{
        $result = true;
        return $return;
    }
    mysqli_stmt_close($stmt);
}

function passValidation($usr,$pwd,$dbc){
    $result;
    $stmt = mysqli_prepare($dbc,'SELECT `us_pw` FROM `USERS` WHERE `us_an` = ?;');
    mysqli_stmt_bind_param($stmt,"s",$usr);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    $row = $resultData->fetch_assoc();
    if(password_verify($pwd,$row['us_pw']) !== false){
        $result = false;
    }else{
        $result = true;
    }
    mysqli_stmt_close($stmt);
    return $result;
}
?>