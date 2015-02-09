<?php

namespace PizzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('PizzaBundle:Pizza:index.html.twig'}

	}

	public function aboutAction()
    {
        return $this->render('PizzaBundle:Pizza:about.html.twig'}

	}


	public function contactAction()
    {
        return $this->render('PizzaBundle:Pizza:contact.html.twig'}

	}


	public function aboutAction()
    {
        return $this->render('PizzaBundle:Pizza:winkel.html.twig'}

	}
