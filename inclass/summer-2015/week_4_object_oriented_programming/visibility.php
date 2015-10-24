<?php

class Employee
{
    /**
     * Employee's full name
     *
     * @var string
     */
    protected $name;

    /**
     * Any medical condition this employee has
     *
     * @var string
     */
    private $medicalCondition;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMedicalCondition()
    {
        return $this->medicalCondition;
    }

    /**
     * @param string $medicalCondition
     */
    public function setMedicalCondition($medicalCondition)
    {
        $this->medicalCondition = $medicalCondition;
    }

//    public function __construct($name, $medicalCondition){
//        $this->name = $name;
//        $this->medicalCondition = $medicalCondition;
//    }


    public function createBadge()
    {
        return 'EmployeeBadge: ' . $this->getName() . ' Has the condition: ' . $this->getMedicalCondition();
    }
}


$Adult = new Employee();
$Adult->setMedicalCondition('The Shakes');
$Adult->setName('John Doe');
echo $Adult->createBadge();

echo "\n\n";
