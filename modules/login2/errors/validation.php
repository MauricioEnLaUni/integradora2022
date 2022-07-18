<?php

$sbm = $_POST['submit'];

// Validates that inputs come from the Submit button
function submitError($sbm){
    if(isset($sbm)){
        $usr = $_POST['usuario'];
        $pwd = $_POST['password'];
        $eml = $_POST['email'];
        // $rpt = $_POST['repeat'];
    }else{
        header("locale:fictichos.com/index.php?error=submit");
        exit();
    }
}

function emptyError($usr,$pwd,$rpt,$eml){
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

function userValidation($usr,$dbc){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$ur)){
        $sql = 'SELECT `us_an` FROM `USERS` WHERE `us_an` = ?;';
        $stmt = mysqli_stmt_init($dbc);
        // Checks the stament works, remove on production.
        if(!mysqli_stmt_prepare($sql,$stmt)){
            header("location: index.php?error=stmt");
            exit();
        }
        mysql_stmt_bind_param($stmt,"s",$usr);
        mysqli_stmt_execute($stmt);
    
        $resultData = mysqli_stmt_get_result($stmt);

        if(mysqli_fetch_assoc($resultData)){
            $result = true;
            return $result;
        }else{
            $result = false;
            return $return;
        }
        mysqli_stmt_close($stmt);
    }else{
        $result = false;
        return $result;
    }
}


function emailValidation($eml,$dbc){
    $result;
    if(!filter_var($eml,FILTER_VALIDATE_EMAIL))
    {
        $sql = 'SELECT `em_us` FROM `EMAIL` WHERE `em_us` = ?;';
        $stmt = mysqli_stmt_init($dbc);
        // Checks the stament works, remove on production.
        if(!mysqli_stmt_prepare($sql,$stmt)){
            header("location:". $_SESSION['back'] ."?error=stmt");
            exit();
        }
        mysql_stmt_bind_param($stmt,"s",$eml);
        mysqli_stmt_execute($stmt);
    
        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            $result = false;
            return $result;
        }else{
            $result = true;
            return $return;
        }
        mysqli_stmt_close($stmt);
    }else{
        $result = true;
    }
}

function passValidation($usr,$pwd,$dbc){
    $result;
    $sql = 'SELECT `us_pw` FROM `USER` WHERE `us_an` = ?;';
    $stmt = mysqli_stmt_init($dbc);
    // Checks the stament works, remove on production.
    if(!mysqli_stmt_prepare($sql,$stmt)){
        header("location:". $_SESSION['back'] ."?error=stmt");
        exit();
    }
    mysql_stmt_bind_param($stmt,"s",$usr);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        if(password_verify($pwd,$row)){
            $result = false;
        }
        return $result;
    }else{
        $result = true;
        return $return;
    }
    mysqli_stmt_close($stmt);
}
?>