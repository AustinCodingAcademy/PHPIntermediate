<?php

class SoupOfTheDay
{
    public $soupName = 'Foo Young Soup';

    /**
     * @param string $soupName
     */
    public function setSoupName($soupName)
    {
        $this->soupName = $soupName;
    }
}