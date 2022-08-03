<?php
for($i = 9;$i < 21;$i++){
  ?>
  <article class="col-12 col-sm-6 col-md-3 col-lg-2">
  <div class="container mainCardSettings mb-2">
  <div class="row">
  <div class="col-12 mainCardImage">
  <img class="" src="img/items/<?php echo $res[$i]['it_id'];?>.jpg" alt="Producto <?php echo $res[$i]['it_nm'];?>"/>
  </div>
  <h3 class="col-12 mainCardTitle"><a href="exhibit.php?product=<?php echo $res[$i]['it_id'];?>">
  <?php echo ucwords($res[$i]['it_nm']);?></a></h3>
  <form method="POST" action="confirm.php" class="col-4">
  <button class="btn mainCardButton"
  <?php
  if($_SESSION['userId'] != 0 && $_SESSION['userId'] != 1 && $_SESSION['userId'] != 2){
    echo "disabled";
  }
  ?> type="submit" name="sale" value="<?php echo $res[$i]['it_id'];?>">
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
  <h4 class="col-8 mainCardPrice">$ <?php ($res[$i]['it_in'] * 1.22 * 1.15)?></h4>
  <p class="col-12 mainCardText"><?php echo substr($res[$i]['it_ds'],0,29) . "...";?></p>
  </div>
  </div>
  </article>
  <?php ;}?>