<?php

class ConstantsTest
{
    // Property, will change depending on context
    protected $sizeOfMonth;

    // Will not change, ever!
    const NUM_DAYS_IN_YEAR = 365;
    const NUM_EARTHS = 1;

    public function __construct($monthSize)
    {
        $this->sizeOfMonth = $monthSize;
    }

    public function howManyDays()
    {
        echo self::NUM_DAYS_IN_YEAR. ' days in a year';
    }
}

########################################################

$constObject = new ConstantsTest(28);
$constObject->howManyDays();

//echo $constObject::NUM_DAYS_IN_YEAR;

//echo ConstantsTest::NUM_DAYS_IN_YEAR;
