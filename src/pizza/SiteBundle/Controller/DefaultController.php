<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('pizzaSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
