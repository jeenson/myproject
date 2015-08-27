<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\PropertyAccess\PropertyAccess;
use AppBundle\Entity\Person;
use AppBundle\Entity\Car;
use AppBundle\Entity\Person1;


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
            
            'age' => 25
        );

        var_dump($accessor->getValue($person, '[first_name]')); 
        var_dump($accessor->getValue($person, '[last_name]'));
        var_dump($accessor->getValue($person, '[age]')); 

        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/property2/", name="property2")
     * Leyendo arreglos Multidimencionales
     */
    public function index2Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();

        $persons = array(
            array(
                'first_name' => 'Jeenson',
                'last_name' => 'Aguilar'
            ),
            array(
                'first_name' => 'Luis Carlos',
                'last_name' => 'Torres'
            )
        );

        var_dump($accessor->getValue($persons, '[0][first_name]'));
        var_dump($accessor->getValue($persons, '[0][last_name]'));
        var_dump($accessor->getValue($persons, '[1][first_name]'));
        var_dump($accessor->getValue($persons, '[1][last_name]'));

        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/property3/", name="property3")
     * Leyendo objetos
     * Accediendo a propiedades publicas
     */
    public function index3Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        
        $person = new Person();
        $person->firstName = 'Patria';
        $person->lastName = 'Ayuso';

        $child = new Person();
        $child->firstName = 'Oscar';

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
        var_dump($accessor->getValue($objCar, 'caja_cambios1'));

        return $this->render('property/index.html.twig');
    }
    /**
     * @Route("/property5/", name="property5")
     * Leyendo objetos - Using Hassers/Issers
     */
    public function index5Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();

        $objCar = new Car();

        if ($accessor->getValue($objCar, 'encendido')) {
            var_dump('El carro se encuentra encendido');
        }else{
            var_dump('El carro se encuentra Apagado');
        }
        

        if ($accessor->getValue($objCar, 'cant_puertas')) {
            //var_dump('Ohh, Carro con Puertas');
            $numP = $accessor->getValue($objCar, 'cant_puertas');
            var_dump('Tiene '. $numP .' de puertas el carro.');
        }

        return $this->render('property/index.html.twig');
    }

    /**
     * @Route("/property6/", name="property6")
     * Escribiendo en Array
     * Accediendo a propiedades publicas
     */
    public function index6Action()
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        
        $person = array();

        $accessor->setValue($person, '[first_name]', 'Jeenson');
        $accessor->setValue($person, '[lastName]', 'Aguilar');
        
        var_dump($accessor->getValue($person, '[first_name]'));
        var_dump($accessor->getValue($person, '[lastName]'));

        return $this->render('property/index.html.twig');
    }
}
