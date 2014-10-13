<?php

class GateEstate
{
    /**
     * Said no one ever!
     *
     * @var string
     */
    public $codeComments = 'Windows is just amaaaazing man!';

    /**
     * This makes no sense, lets let our children figure this one out.
     *
     * @var string
     */
    protected $childrenCanSeeThis = 'CallProc32W is insane. It\'s a variadic function that uses';

    /**
     * Windows code comment that only the GateEstate is privy to seeing
     * You can only access this property in the GateEstate class using the $this keyword
     *
     * @var string
     */
    private $windowsCodeComment = 'HACK ALERT, believe it or not there is no way to get the height of the current window';
}

class RJGate extends GateEstate
{
    public function __construct()
    {
        echo 'I can see this public property as well: ' . $this->codeComments;
        echo 'I can see $childrenCanSeeThis: ' . $this->childrenCanSeeThis;
    }
}