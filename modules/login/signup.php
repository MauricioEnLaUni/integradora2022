<?php
if(isset($_POST['submit']))
{
  $ur = $_POST['user'];
  $sw = $_POST['pass'];
  $rp = $_POST['repeat'];
  $em = $_POST['email'];

  require_once "start.php";
  require_once "error.php";

  if(empty_error($ur,$sw,$rp,$em) !== false)
  {
    header("location: next.php?error=400&code=RequiredField");
    exit();
  }
  if(invalidUser($ur,$dbc) !== false)
  {
    header("location: next.php?error=400&code=InvalidInput&field=ur");
    exit();
  }
  if(invalidPw($sw) !== false)
  {
    header("location: next.php?error=400&code=InvalidInput&field=sw");
    exit();
  }
  if(repeatPassword($sw,$rp) !== false)
  {
    header("location: next.php?error=400&code=InvalidInput&field=rp");
    exit();
  }
  if(invalidEmail($em,$dbc) !== false)
  {
    header("location: next.php?error=400&code=InvalidInput&field=em");
    exit();
  }

  createUser($dbc,$ur,$sw,$em);
} else
{
  header("location: start.php");
}
?>