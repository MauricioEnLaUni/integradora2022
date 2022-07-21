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
</head>

<body>
    <?php
      include_once "modules/modal.php";
    ?>
    <?php
        include_once "modules/header.php";
    ?>
    
    <?php
        include_once "modules/exhibit.php";
    ?>
    <?php
        include_once "modules/footer.php";
    ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <?php
        include_once "modules/meta/scripts.html";
    ?>
</body>