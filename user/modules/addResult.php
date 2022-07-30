<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
if(isset($_POST['submit'])){
  $stmt = $conn->prepare("UPDATE `address`
  SET `ad_nb` = :n , `ad_st` = :s , `ad_ps` = :p , `ad_zn` = :z , `ad_cy` = :y , `ad_ct` = :t
  WHERE `ad_id` = :i");
  $stmt->bindParam('n',$_POST['nb']);
  $stmt->bindParam('s',$_POST['st']);
  $stmt->bindParam('z',$_POST['zn']);
  $stmt->bindParam('p',$_POST['ps']);
  $stmt->bindParam('y',$_POST['cy']);
  $stmt->bindParam('t',$_POST['ct']);
  $stmt->bindParam('i',$_POST['submit']);
  $stmt->execute();
  header("Location:/Integradora/user/address.php");
}else header("Location:/Integradora/index.php");
?>