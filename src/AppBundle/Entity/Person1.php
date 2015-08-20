<?php
namespace AppBundle\Entity;

class Person1
{
    public $firstName;
    private $lastName;
    private $children = array();

    public function setLastName($name)
    {
        $this->lastName = $name;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }
}