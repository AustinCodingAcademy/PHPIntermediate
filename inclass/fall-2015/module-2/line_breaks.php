<?php

// heredoc syntax
$class = <<<FOO
you dont have to do any of that
asd
asd
FOO;

$string = 'The weather
is just \'awesome\'
today';

echo PHP_EOL;

echo str_replace("\n", ".__.", $string);

echo PHP_EOL;