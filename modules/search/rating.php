<?php
$stmt = $conn->prepare('SELECT `it_id`
FROM `item`
WHERE `it_id` IN (
SELECT `sc_it`
FROM `score`
HAVING AVG(`sc_se`) >= ?
);');
$cal = (isset($_GET['inCal'])) ? $_GET['inCal'] : 2;
getSearch($stmt,$cal,$scores);
?>