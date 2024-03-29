<?php
session_start();
function manageSessions(){
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = 4;
        $_SESSION['page'] = $_SERVER['REQUEST_URI'];
        $_SESSION['back'];
        $_SESSION['start'] = date('Y-m-d H:i:s');
        $_SESSION['last_activity'] = date('Y-m-d H:i:s');
        $_SESSION['location'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['userId'] = 0;
    }else{
        $_SESSION['back'] = $_SESSION['page'];
        $_SESSION['back'] = substr($_SESSION['back'], 0, strpos($_SESSION['back'], "?"));
        $_SESSION['page'] = $_SERVER['REQUEST_URI'];
        $_SESSION['last_activity'] = date('Y-m-d H:i:s');
    }
}
function activity(){
    $_SESSION['last_activity'] = date('Y-m-d H:i:s');
}
function closeInactive(){
    if(time() - $_SESSION['last_activity'] > 1440){
        session_unset();
        session_destroy();
    }
}
function regenerateId(){
    if(time() - $_SESSION['start'] > 1440){
        session_regenerate_id(true);
        $_SESSION['start'] = time();
    }
}
function onPage(){
    manageSessions();
    activity();
    regenerateId();
}
onPage();
?>