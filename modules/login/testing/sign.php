<?php
if(isset($_POST['submit']))
{
  $ur = $_POST['user'];
  $sw = $_POST['pass'];
} else
{
  header("location: start.php");
}
?>