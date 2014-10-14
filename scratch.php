<?php

/**
 * Teach everyone how to practice karate
 *
 * @param string $name        Instructor name
 * @param int    $numStudents How many students in the class
 * @param array  $names       Array of student names
 *
 * @return bool [true = Yes! Everyone learned karate, false = No! Not everyone is a karate kid]
 */
function learnKarate($name, $numStudents, $names)
{
    echo 'Instructor for this class is: ' . $name . PHP_EOL;

    echo 'There are ' . $numStudents . ' in this karate class!' . PHP_EOL;

    foreach ($names as $name) {

        echo "\t".$name . ' is a karate kid!'.PHP_EOL;
    }

    return true; // Everyone is a karate kid!
}

if(learnKarate('Chun Lee', 12, ['Hugh Jass', 'Kung Fu Panda', 'Donald Macaque'])){
    echo 'Everyone is a karate kid!';
}else{
    echo 'Some kids were left behind!';
}