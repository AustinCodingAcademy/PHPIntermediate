<?php

$today = date('Y-d-m h:i:s');

echo '$today=' . $today;

$nixTimestamp = strtotime('-2 years');
echo '<br/>';
echo '$nixTimestamp=' . $nixTimestamp;

$formattedDate = date('m/d/Y', $nixTimestamp);
echo '<br/>';
echo '$formattedDate=' . $formattedDate;