<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller
{
    public function indexAction()
    {
        return $this->render('pizzaSiteBundle:View:index.html.twig', array(
                // ...
            ));    }

    public function aboutAction()
    {
        return $this->render('pizzaSiteBundle:View:about.html.twig', array(
                // ...
            ));    }

    public function contactAction()
    {
        return $this->render('pizzaSiteBundle:View:contact.html.twig', array(
                // ...
            ));    }

    public function winkelkarAction()
    {
        return $this->render('pizzaSiteBundle:View:winkelkar.html.twig', array(
                // ...
            ));    }

}
