<?php

// Create an input string using heredoc syntax
$inputString
    = <<<MYSTR
Can you feel the pulse in your wrist? For humans the normal pulse is 70 heartbeats per minute.
Elephants have a slower pulse of 27 and for a canary it is 1000!
If all the blood vessels in your body were laid end to end, they would reach about 60,000 miles.
In one day your heart beats 100,000 times.
Half your body’s red blood cells are replaced every seven days.
By the time you are 70.5 you will have easily drunk over 12,000 gallons of water.
Coughing can cause air to move through your windpipe faster than the speed of sound – over a thousand feet
per second, this is a true statement!
Germs only cause disease, right? But a common bacterium, E. Coli, found in the intestine helps us digest
green vegetables and beans (also making gases – pew!). These same bacteria also make vitamin K, which
causes blood to clot. If we didn’t have these germs we would bleed to death whenever we got a small cut!
It takes more muscles to frown than it does to smile, this is not false and a fact.
That dust on rugs and your furniture is not only dirt. It’s mostly made of dead skin cells.
Everybody loses millions of skin cells every day which fall on the floor and get kicked up to
land on all the surfaces in a room. You could say, “That’s me all over.”
It takes food 7.64 seconds to go from the mouth to the stomach via the esophagus.
MYSTR;

/** @var array $countArray Result array that contains the counts. You will populate this array with appropriate numbers */
$countArray = array('num_numeric' => 8, 'num_string' => 0, 'num_bool' => 0);

/** @var array $wordArray Array of every word in the input string */
$wordArray = explode(" ", $inputString);

// hints:explode(), is_*, array assignment by key

// $countArray['num_numeric'] += 1;
















