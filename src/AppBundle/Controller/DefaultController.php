<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/product/new", name="prodectNew")
     */
    public function createAction()
    {
        $product = new Product();
        //$product->setName('Televison');
        $product->setPrice('160');
        $product->setDescription('Samsung 50');

        $validator = $this->get('validator');
        $errors = $validator->validate($product);

        if (count($errors) > 0) {
            return $this->render('product/validation.html.twig', array(
                'errors' => $errors,
            ));
        }else{
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return new Response('Created product id '.$product->getId());
        }
    }

    /**
    * @Route("/product/view", name ="productView")
    */
    public function viewAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
        $product = $repository->findOneById(1);
        //$product = $repository->findOneByName('notebook');
        //$product = $repository->findAll();
        //$product = $repository->findByPrice(15);
        /*
        $product = $repository->findOneBy(
            array('name' => 'foo', 'price' => 19.99)
        );
        $product = $repository->findBy(
            array('name' => 'notebook'),
            array('price' => 'ASC')
        );*/
        
        /*
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM AppBundle:Product p
            WHERE p.price >= :price
            ORDER BY p.price ASC'
        )->setParameter('price', '19.99');

        $query = $repository->createQueryBuilder('p')
        ->where('p.price > :price')
        ->setParameter('price', '14')
        ->orderBy('p.price', 'ASC')
        ->getQuery();
        $product = $query->getResult();
        */
        
        
         $categoryName = $product->getCategory()->getName();

        dump($categoryName);
        die();

    }

    /**
    * @Route("/product/show", name ="productShow")
    */
    public function showProductsAction($id = 1)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        $category = $product->getCategory();

        dump(get_class($category));
        die();
    }
}
