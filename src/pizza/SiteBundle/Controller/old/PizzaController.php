<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use pizza\SiteBundle\Entity\Pizza;
use pizza\SiteBundle\Entity\Categorie;

class PizzaController extends Controller
{
    public function smallAction()
    {
        return $this->render('pizzaSiteBundle:Pizza:small.html.twig', array(
                // ...
            ));    }

    public function mediumAction()
    {
        return $this->render('pizzaSiteBundle:Pizza:medium.html.twig', array(
                // ...
            ));    }

    public function largeAction()
    {
        return $this->render('pizzaSiteBundle:Pizza:large.html.twig', array(
                // ...
            ));    }

    # Persisting Objects to the Database   
    public function createAction()
    {   


    $pizza = new Pizza();
    $pizza->setName('Hot Lovers');
    $pizza->setDescription('jalapenos, pepperoni, paprika, ui');

    $pizza1 = new Pizza();
    $pizza1->setName('Hawai');
    $pizza1->setDescription('ham, kip, ananas');

    $pizza2 = new Pizza();
    $pizza2->setName('Four seasons');
    $pizza2->setDescription('ham, salami, paprika, champignons');

    $pizza3 = new Pizza();
    $pizza3->setName('Talia special');
    $pizza3->setDescription('salami, champignons, ui, kip, gehakt, gorgonzola, ei');

    $pizza4 = new Pizza();
    $pizza4->setName('Meat Lovers');
    $pizza4->setDescription('ham, champignons, parika, ui, shoarmavlees, look');

    $pizza5 = new Pizza();
    $pizza5->setName('Toni pepperoni');
    $pizza5->setDescription('dubbele portie pepperoni, mozzarella');

    $pizza6 = new Pizza();
    $pizza6->setName('Funky chicken');
    $pizza6->setDescription('ui, ananas, paprika, kip');

    $pizza7 = new Pizza();
    $pizza7->setName('vegetarian');
    $pizza7->setDescription('champignons, paprika, ui, olijven, mais, schijfjes tomaat');

    $pizza8= new Pizza();
    $pizza8->setName(' bbq chicken');
    $pizza8->setDescription('kaas, barbequesaus, gegrilde kip, ui, paprika, mozzarella');

    $em = $this->getDoctrine()->getManager();

    $em->persist($pizza);
    $em->persist($pizza1);
    $em->persist($pizza2);
    $em->persist($pizza3);
    $em->persist($pizza4);
    $em->persist($pizza5);
    $em->persist($pizza6);
    $em->persist($pizza7);
    $em->persist($pizza8);

    $em->flush();

    return $this->render('pizzaSiteBundle:Pizza:index.html.twig');

    }

    public function showAction($id)
    {

        $pizza = $this->getDoctrine()
            ->getRepository('pizzaSitebundle:Pizza')
            ->find($id);

        if(!$pizza)
        {
                
        }

    }
     

}
