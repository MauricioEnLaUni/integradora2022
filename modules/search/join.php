<?php
function arrayAnd($one,$two){
  $end = [];
  foreach($one as $o){
    if(in_array($o,$two)) $end[] = $o;
  }
  return $end;
}

$t1 = arrayAnd($brand,$txt);
$t2 = arrayAnd($off,$minmax);
$t3 = arrayAnd($whose,$colors);
$t4 = arrayAnd($scores,$type);
$t5 = arrayAnd($t1,$t2);
unset($t1);
unset($t2);
$t1 = arrayAnd($t3,$t4);
$end = arrayAnd($t1,$t5);
?>