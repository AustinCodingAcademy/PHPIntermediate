<?php

$names = ['Mary', 'Joe', 'Bob', 'Robert'];

$counter = 0;

echo '<table>';

foreach($names as $name){

    if($counter % 2 == 0){
        $style = 'background-color: red;';
    }else{
        $style = 'background-color: blue;';
    }

    echo '<tr><td style="'.$style.'">'.$name.'</td></tr>';

    $counter++;
}

echo '</table>';