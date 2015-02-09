<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CustomerController extends Controller
{

	public function indexAction()
    {
        return $this->render('pizzaSiteBundle:Customer:register.html.twig');
    }   
}
