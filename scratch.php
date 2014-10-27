<?php

/**
 * Class WithDI illustrates a class with dependencies that have been injected
 */
class WithDI
{
    /**
     * Datbase connection
     *
     * @var DBCommon
     */
    protected $DB;

    /**
     * User placing an order
     *
     * @var ACAPerson
     */
    protected $User;

    /**
     * Order object containing the user's entire order
     *
     * @var ACAOrder
     */
    protected $Order;

    public function __construct(DBCommon $DB, ACAPerson $User, ACAOrder $Order)
    {
        $this->DB = $DB;
        $this->User = $User;
        $this->Order = $Order;
    }
}


/**
 * Class WithoutDI illustrates a class with the ability for itself to fetch it's own dependencies.
 */
class WithoutDI
{
    /**
     * Datbase connection
     *
     * @var DBCommon
     */
    protected $DB;

    /**
     * User placing an order
     *
     * @var ACAPerson
     */
    protected $User;

    /**
     * Order object containing the user's entire order
     *
     * @var ACAOrder
     */
    protected $Order;

    public function __construct($userId, $orderId)
    {
        $this->DB = Factory::getDB();
        $this->User = Factory::getACAPerson($userId);
        $this->Order = Factory::getACAOrder($orderId);
    }
}
