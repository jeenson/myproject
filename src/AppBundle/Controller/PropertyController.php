<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\PropertyAccess\PropertyAccess;
use AppBundle\Entity\Person;
use AppBundle\Entity\Car;


class PropertyController extends Controller
{
    /**
     * @Route("/property1/", name="property1")
     * Leyendo arreglos
     */
    public function index1Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        
        $person = array(
            'first_name' => 'Jeenson',
        );

        var_dump($accessor->getValue($person, '[first_name]')); 
        var_dump($accessor->getValue($person, '[age]')); 

        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/property2/", name="property2")
     * Leyendo arreglos
     */
    public function index2Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();

        $persons = array(
            array(
                'first_name' => 'Jeenson',
            ),
            array(
                'first_name' => 'Luis Carlos',
            )
        );

        var_dump($accessor->getValue($persons, '[0][first_name]'));
        var_dump($accessor->getValue($persons, '[1][first_name]'));

        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/property3/", name="property3")
     * Leyendo objetos
     */
    public function index3Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        
        $person = new Person();
        $person->firstName = 'Jeenson';
        $person->lastName = 'Aguilar';

        $child = new Person();
        $child->firstName = 'Luis Carlos';

        //Agregando el Hijo del Padre
        $person->children = array($child);
        
        var_dump($accessor->getValue($person, 'firstName'));
        var_dump($accessor->getValue($person, 'lastName'));
        var_dump($accessor->getValue($person, 'children[0].firstName'));

        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/property4/", name="property4")
     * Leyendo objetos - Usando Getters
     */
    public function index4Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();

        $objCar = new Car();

        var_dump($accessor->getValue($objCar, 'marca'));
        var_dump($accessor->getValue($objCar, 'caja_cambios'));

        return $this->render('property/index.html.twig');
    }
}
