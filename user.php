<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manejo de Cuenta</title>
  <?php
  include_once 'config.php';
  include_once ROOT . '/user/userStyle.php';
  ?>
</head>
<body>
  <header>
    <?php
      include_once ROOT . '/modules/session.php';
      include_once ROOT .'/modules/header.php';
    ?>
  </header>
  <main>
  <?php
  if($_SESSION['user'] == 4){
    header("Location:" . ROOT . "index.php");
    exit();
  }else{
    if(!isset($_GET['page'])){
      include_once ROOT . '/user/user.php';
    }else{
      switch($_GET['page']){
        case 'o':
          include_once ROOT . '/user/orders.php';
          break;
        case 'a':
          include_once ROOT . '/user/account.php';
          break;
        case 'd':
          include_once ROOT . '/user/address.php';
          break;
        case 'p':
          include_once ROOT . '/user/pay.php';
          break;
        default:
          include_once ROOT . '/user/user.php';
      }
    }
  }
  ?>
  </main>
  <footer>
    <?php
      include_once ROOT . '/modules/footer.php';
    ?>
  </footer>
</body>
</html>
<?php
  include_once ROOT . '/modules/meta/scripts.html';
?>