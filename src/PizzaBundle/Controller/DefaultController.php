<?php

namespace PizzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PizzaBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('PizzaBundle:Default:contact.html.twig');
    }
}
