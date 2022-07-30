<?php
include_once "../modules/session.php";
include_once "../../../ssl/connector.php";
$stmt = $conn->prepare('SELECT *
FROM `address`
WHERE `ad_us` = :u');
$stmt->bindParam('u',$_SESSION['userId']);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="container pt-4 pb-5">
  <div class="row">
    <p><a href="user.php">Mi Cuenta</a> > Mis Direcciones</p>
  </div>

  <div class="row text-center">
    <p class="h1">Mis Direcciones</p>
  </div>
  <div class="row mt-2 mb-5">
    <?php
    if(count($result) < 5){
      include_once "addModal.php";
    ?>
    <div class="col-12 col-sm-6 col-md-4">
      <button class="row d-flex userNav addCards justify-content-center align-items-center" id="addCont" data-bs-toggle="modal" data-bs-target="#addModal">
        <img src="/Integradora/img/svg/plus-square-dotted.svg" id="addAdd" class="row"/>
        <p class="h5 row" id="addTxt">Añadir</p>
      </button>
    </div>
    <?php
  }
  ?>
<?php
  foreach($result as $row){
  ?>
  <div class="col-12 col-sm-6 col-md-4 justify-content-center align-items-center">
    <div class="row userNav addCards d-flex">
      <p class="h2 mt-3 text-center"><strong>Dirección</strong></p>
      <form action="/Integradora/user/modules/addResult.php" method="post">
        <label class="col-7 addField">
          <p class="h4">Calle:</p>
          <input type="text" value="<?php echo $row['ad_st'];?>" name="st"/>
        </label>
        <label class="col-4 addField">
          <p class="h4">Número: </p>
          <input type="number" value="<?php echo $row['ad_nb'];?>" name="nb" id="nbAdd"/>
        </label>
        <label class="col-12 addField">
          <p class="h4">Colonia: </p>
          <input type="text" value="<?php echo $row['ad_zn'];?>" name="zn"/>
        </label>
        <label class="col-12 addField">
          <p class="h4">Código Postal: </p>
          <input type="text" value="<?php echo $row['ad_ps'];?>" name="ps"/>
        </label>
        <label class="col-7 addField">
          <p class="h4">Ciudad: </p>
          <input type="text" value="<?php echo $row['ad_cy'];?>" name="cy"/>
        </label>
        <label class="col-3 addField">
          <p class="h4">País: </p>
          <select name="ct" id="country">
            <option value="GT">GT</option>
            <option value="CU">CU</option>
            <option value="MX">MX</option>
            <option value="US">US</option>
          </select>
        </label>
        <button type="submit" name="submit" class="btn btn-link col-3" value="<?php echo $row['ad_id']; ?>">Editar</button>
        <a style="color: var(--blueU);" class="btn btn-link col-3" href="/Integradora/user/modules/addDel.php?i=<?php echo $row['ad_id']; ?>">Descartar</a>
      </form>
    </div>
  </div>
<?php }?>

</div>