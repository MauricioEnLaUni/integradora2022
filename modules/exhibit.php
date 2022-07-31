<div class="container mb-5 col-10" id="exCont">
<div class="row">
<div class="col-md-4" id="itemImage">
</div>
<div class="col-md-8">
    <div class="row text-center">
        <h1 id="itemName"><?php echo ucwords($item['it_nm']); ?></h1>
    </div>
    <div class="row">
    <div class="col-6">
        <h2 >Precio</h2>
    </div>
    <div class="col-6">
        <h2 id="itemPrice"><?php echo ($item['it_in'] * 1.2); ?></h2>
    </div>
    <div class="row">
        <p id="itemDesc"><?php echo $item['it_ds'] . $item['it_id']; ?></p>
    </div>
    <div class="row">
    <form method="POST" action="confirm.php" class="col-4">
      <button class="btn mainCardButton" type="submit" name="sale" value="<?php echo $item['it_id'];?>">
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
    </div>
        <div class="row">
    <form action="modules/rating.php" method="post">
      <fieldset id="calificacion">
        <?php
        $stmt = $conn->prepare('SELECT AVG(`sc_se`) AS `score`
        FROM `SCORE`
        WHERE `sc_it` = :i;');
        $stmt->bindParam('i',$id);
        $stmt->execute();
        $score = $stmt->fetchColumn();
        ?>
        <input
        class="rating rating--nojs"
        max="5"
        name="inCal"
        step=".5"
        type="range"
        value="<?php echo $score;?>"
        />
        <button type="submit" class="btn btn-info" name="submit" value="<?php echo $item['it_id'];?>">¡Calificar!</button>
      </fieldset>
    </form>
    </div>
    </div>
</div>
</div>


<div class="row" id="svgHell">
    <div class="col-md-3">
    <div class="row">
        <p class="h3 text-center svgTitle">Estilo</p>
    </div>
    <div class="row" id="itemIcon"></div>
    </div>
    <div class="col-md-6">
    <div class="row">
        <p class="h3 text-center svgTitle sideBorder">Género</p>
        </div>
    <div class="row" id="shoesWhose">
        <img src="img/svg/genders/man.svg" class="col-md-4 out" id="man"/>
        <img src="img/svg/genders/woman.svg" class="col-md-4 out" id="woman"/>
        <img src="img/svg/genders/unisex.svg" class="col-md-4 out" id="genderless"/>
        <img src="img/svg/genders/child.svg" class="col-md-4 out" id="child"/>
    </div>
    </div>
    <div class="col-md-3">
    <div class="row">
        <div class="h3 text-center svgTitle">Marca</div>
    </div>
    <div class="row" id="marca"></div>
    </div>
</div>
</div>
</div>