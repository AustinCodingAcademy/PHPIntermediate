<?php

$classMates = array('alex', 'jerry', 'simon', 'samir', 'brian', 'traci', 'jared');

$numClassmates = count($classMates);

$index = rand(0, $numClassmates - 1);

header('Content-Type: application/json');

echo json_encode(
    array(
        'name' => $classMates[$index],
        'time' => date('Y-m-d h:i:s')
    )
);