<?php
function andMe(&$t,&$t2,&$e){
  if(empty($t)) $t[] = 0;
  if(empty($t2)) $t2[] = 0;
  andArray($t,$t2,$e);
  array_unique($e);
  unset($t);
  unset($t2);
}
if(empty($off)) andArray($txt,$scores,$tmp1);
if(empty($type)) andArray($type,$minmax,$tmp2);
andMe($tmp1,$tmp2,$end);
andArray($brand,$whose,$tmp1);
andArray($tmp1,$end,$end);
array_unique($end);
?>