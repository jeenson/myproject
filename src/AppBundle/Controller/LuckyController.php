<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
// --> don't forget this new use statement
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
    
    /**
    * @Route("lucky/index")
    */
    public function indexAction(Request $request)
    {
        $this->addFlash(
            'notice',
            'Desplegando mensajes flash!'
        );

         return $this->render(
            'lucky/index.html.twig'
        );

    }

    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        
        $number = rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/lucky/numberT/{count}")
     */
    public function numberTAction($count)
    {
        
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }

        $numbersList = implode(', ', $numbers);

        return $this->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );
        /*
        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );

        return new Response($html);
        */
    }

    /**
     * @Route("/lucky/numberM/{count}")
     */
    public function numberMAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        return new Response(
            '<html><body>Lucky numbers: '.$numbersList.'</body></html>'
        );
    }

    /**
    * @Route("api/lucky/number")
    */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        /*return new Response(
            json_encode($data),
            200,
            array('Content-Type' => 'application/json')
        );*/

        // calls json_encode and sets the Content-Type header
        return new JsonResponse($data);
    }

}