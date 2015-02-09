<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pizza\SiteBundle\Entity\Categorie;
use pizza\SiteBundle\Entity\Bestelbon;


class CategorieController extends Controller
{

	public function createAction()
	{

		$categorie = new Categorie();
		$categorie->setSize('Small');
		$categorie->setPrice(8);

		$categorie1 = new Categorie();
		$categorie1->setSize('Medium');
		$categorie1->setPrice(10); 

		$categorie2 = new Categorie();
		$categorie2->setSize('Large');
		$categorie2->setPrice(13);

		$em = $this->getDoctrine()->getManager();

    	$em->persist($categorie);
    	$em->persist($categorie1);
    	$em->persist($categorie2);
    	
    	$em->flush();


    	#return new Response('Created categorie id '.$categorie->getId()->getName()->getPrice());

    	return $this->render('pizzaSiteBundle:Default:test.html.twig');

	}

	public function updateAction()
	{
		
	}
}
