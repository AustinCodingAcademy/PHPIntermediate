```php
<?php
/**
 * For a given input string, create a function that will return an array indicating the number of words, integers and floats.
 *
 * @note   : Numbers that are formatted with commas are still numbers.
 * @author {name}
 * @since  {date mm/dd/yyyy}
 */

#Define a constant, if true, run the program, otherwise do nothing.
define('CAN_RUN', true);

//Create an input string using heredoc syntax
$inputString
    = <<<MYSTR
Can you feel the pulse in your wrist? For humans the normal pulse is 70 heartbeats per minute. Elephants have a slower pulse of 27 and for a canary it is 1000!
If all the blood vessels in your body were laid end to end, they would reach about 60,000 miles.
In one day your heart beats 100,000 times.
Half your body’s red blood cells are replaced every seven days.
By the time you are 70.5 you will have easily drunk over 12,000 gallons of water.
Coughing can cause air to move through your windpipe faster than the speed of sound – over a thousand feet per second, this is a true statement!
Germs only cause disease, right? But a common bacterium, E. Coli, found in the intestine helps us digest green vegetables and beans (also making gases – pew!). These same bacteria also make vitamin K, which causes blood to clot. If we didn’t have these germs we would bleed to death whenever we got a small cut!
It takes more muscles to frown than it does to smile, this is not false and a fact.
That dust on rugs and your furniture is not only dirt. It’s mostly made of dead skin cells.
Everybody loses millions of skin cells every day which fall on the floor and get kicked up to land on all the surfaces in a room. You could say, “That’s me all over.”
It takes food 7.64 seconds to go from the mouth to the stomach via the esophagus.
MYSTR;

/**
 * Count the number of int, float, bool and string data types in the given input string
 *
 * @param string $inputString Input string to analyze
 *
 * @return array
 */
function countDataTypes($inputString)
{
    //Evaluate this constant
    if (!CAN_RUN) {
        die('I cannot not run!');
    }

    $countArray = array('num_int' => null, 'num_float' => null, 'num_bool' => null, 'num_string' => null);

    return $countArray;
}


##############--==USAGE==--##############
$returnedCountArray = countDataTypes($inputString);
echo 'Here are your results:'.PHP_EOL;
print_r($returnedCountArray);
```