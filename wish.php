<?php
include_once "config.php";
include_once "modules/session.php";
include_once CONN . "/connector.php";
$_SESSION['wish'] = array_unique($_SESSION['wish']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
  crossorigin="anonymous"
  />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/confirmSale.css">
  <link rel="stylesheet" href="css/colors.css">
  <link rel="stylesheet" href="css/order.css">
</head>
<body>
  <header>
  <?php
  include_once "modules/header.php";
  ?>
  </header>
  <main>
  <div class="container-fluid mt-2 mb-5" id="orderPage">
  <div class="row">
      <h1 id="titleSale">Lista de Deseos</h1>
  </div>
  <div class="row">
    <table class="table table-dark table-stripped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Carrito</th>
          <th scope="col">Quitar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        $stmt = $conn->prepare('SELECT `it_nm`,`it_in` AS `price`,`it_id`
                                FROM `ITEM`
                                WHERE `it_nm` = :n');
        $stmt->bindParam('n',$j);
        foreach($_SESSION['wish'] as $j=>$v){
          $stmt->execute();
          if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
        <tr>
          <th scope="row"><?php echo $i++;?></th>
          <td><?php echo $row['it_nm'];?></td>
          <td><?php echo $row['price'];?></td>
          <td>
            <form method="POST" action="confirm.php">
              <button class="btn mainCardButton" type="submit" name="sale" value="<?php echo $row['it_nm']?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="curr
                entColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V
                8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12
                h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0
                  .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.
                915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7
                  0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
              </button>
            </form>
          </td>
          <form action="modules/rmvItem.php" method="POST">
            <input type="number" name="dont" value="1" hidden>
            <td><button type="submit" name="rmv" value="<?php echo $row['it_nm']?>">Quitar</button></td>
          </form>
        </tr>
        <?php }}?>
      </tbody>
    </table>
  </div>
</div>
</main>
<?php
include_once "modules/footer.php";
?>
</body>
</html>