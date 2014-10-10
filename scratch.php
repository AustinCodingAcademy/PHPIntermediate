<?php

class Employee
{
    /**
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
     * @param string $medicalCondition
     */
    public function setMedicalCondition($medicalCondition)
    {
        $this->medicalCondition = $medicalCondition;
    }

    /**
     * @return string
     */
    public function getMedicalCondition()
    {
        return $this->medicalCondition;
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
    public function getName()
    {
        return $this->name;
    }
}

$Adult = new Employee();
$Adult->setMedicalCondition('The Shakes');
$Adult->setName('John Doe');
print_r($Adult);