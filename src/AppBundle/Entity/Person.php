<?php

namespace AppBundle\Entity;

//use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;

class Person
{

	/**
	 * @var string $firstName
	 *
	 */
	public $firstName;

	/**
	 * @var string $lastName
	 *
	 */
	public $lastName;

	/**
	* @var array $children
	*/
	public $children = array();

	
}