<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Fictichos</title>
    <?php
        include_once "modules/meta/stylesheets.php";
    ?>
    <link rel="stylesheet" href="css/exhibit.css">
</head>

<body>
    <header>
    <?php
      require_once "modules/session.php";
      require_once "../../ssl/connector.php";
      include_once "modules/header.php";
    ?>
    </header>
      <?php 
      include_once "modules/modal.php";?>
    <main>
        <?php include_once "modules/exhibit.php";?>
    </main>
    <footer>
        <?php include_once "modules/footer.php";?>
    </footer>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <?php
    include_once "modules/meta/scripts.html";
    $id = $_GET['product'];

    $stmt = $conn->prepare('SELECT `it_nm`,`it_ds`,`it_ot`,`it_br`,`it_mt`,`it_cl`,`it_tp`,`it_wh`,`it_of`
                            FROM `ITEM`
                            WHERE `it_id` = :i');
    $stmt->bindParam('i',$id);
    $stmt->execute();
    while($row = $stmt->fetch()){
        $loljson = json_encode($row);
        echo "<script>exhibit('itemImage',$loljson,$id)</script>";
        
    }
    ?>
    <?php
        include_once "modules/meta/scripts.html";
    ?>
</body>
</html>