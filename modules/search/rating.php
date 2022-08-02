<?php
$scores = [];
$stmt = $conn->prepare('SELECT `it_id`
FROM `ITEM`
WHERE `it_id` IN (
SELECT `sc_it`
FROM `SCORE`
GROUP BY (`sc_it`)
HAVING AVG(`sc_se`) >= ?
);');
$cal = (isset($_GET['inCal'])) ? $_GET['inCal'] : 2;
getSearch($stmt,$cal,$scores);
?>