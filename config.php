<?php
define('ROOT','C:/xampp/htdocs/Integradora');
define('CONN','C:/xampp/ssl');

function pictureDraw($smolWeb,$normalWeb,$smolJPG,$normalJPG,$alt){
  echo '<picture>
      <source srcset="img/' . $smolWeb . ' 599w,
                      img/' . $smolJPG .' 599w,
                      img/' . $normalWeb . ' 600w,
                      img/' . $normalJPG . ' 600w"
              sizes="(min-width:576px) 400w
                      (min-width: 768px) 600w"
              type="image/webp"
              src="img/' . $normalJPG . '"
              alt="' . $alt . '"/>
      <img src="img/' . $normalJPG . '" alt="' . $alt . '"/>
  </picture>';
}
?>