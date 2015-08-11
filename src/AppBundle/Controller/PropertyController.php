<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\PropertyAccess\PropertyAccess;
//use Symfony\Component\HttpFoundation\Request;

class PropertyController extends Controller
{
    /**
     * @Route("/property/", name="property1")
     */
    public function indexAction()
    {
        
        $accessor = PropertyAccess::createPropertyAccessor();

        /*
        $person = array(
            'first_name' => 'Wouter',
        );

        var_dump($accessor->getValue($person, '[first_name]')); // 'Wouter'
        var_dump($accessor->getValue($person, '[age]')); // null
        */
        $persons = array(
            array(
                'first_name' => 'Wouter',
            ),
            array(
                'first_name' => 'Ryan',
            )
        );

        var_dump($accessor->getValue($persons, '[0][first_name]')); // 'Wouter'
        var_dump($accessor->getValue($persons, '[1][first_name]')); // 'Ryan'

        return $this->render('property/index.html.twig');
    }
}
