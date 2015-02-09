<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pizza\SiteBundle\Entity\Users;
use pizza\SiteBundle\Entity\Customer;
use pizza\SiteBundle\Entity\Phone;
use pizza\SiteBundle\Entity\City;

use Symfony\Component\HttpFoundation\Request;


class UsersController extends Controller
{
    public function indexAction()
    {
        return $this->render('pizzaSiteBundle:User:login.html.twig', array(
                // ...
            ));    }

    # Persisting Objects to the Database   
    public function createAction()
    {

    $phone = new Phone();
    $phone->setPhonenumber('0479412563');

    $phone1 = new Phone();
    $phone1->setPhonenumber('0489523698');

    $phone2 = new Phone();
    $phone2->setPhonenumber('0471236583');

    $phone3 = new Phone();
    $phone3->setPhonenumber('0479523698');

    $city = new City();
    $city->setZipcode(1180);
    $city->setCity('Brussel');

    $city1 = new City();
    $city1->setZipcode(9400);
    $city1->setCity('Ninove');

    $city2 = new City();
    $city2->setZipcode(9000);
    $city2->setCity('Gent');

    $city3 = new City();
    $city3->setZipcode(9300);
    $city3->setCity('Aalst');

    $customer = new Customer();
    $customer->setFirstname('Katrien');
    $customer->setLastname('De Smet');
    $customer->setStreet('Kwantumstraat');
    $customer->setHousenumber(17);
    $customer->setCityId($city);
    $customer->setPhoneId($phone);

    $customer1 = new Customer();
    $customer1->setFirstname('Leen');
    $customer1->setLastname('De Smet');
    $customer1->setStreet('Droogtraat');
    $customer1->setHousenumber(10);
    $customer1->setCityId($city1);
    $customer1->setPhoneId($phone1);

    $customer2 = new Customer();
    $customer2->setFirstname('Olivier');
    $customer2->setLastname('Van der Kelen');
    $customer2->setStreet('Kievitstraat');
    $customer2->setHousenumber(8);
    $customer2->setCityId($city2);
    $customer2->setPhoneId($phone2);

    $customer3 = new Customer();
    $customer3->setFirstname('Elke');
    $customer3->setLastname('Kempkes');
    $customer3->setStreet('Merellaan');
    $customer3->setHousenumber(31);
    $customer3->setCityId($city3);
    $customer3->setPhoneId($phone3);

    $users = new Users();
    $users->setUsername('Katds');
    $users->setEmail('katrien@mailinator.com');
    $users->setPassword('paswoord');
    $users->setcustomerId($customer);

    $users1 = new Users();
    $users1->setUsername('leends');
    $users1->setEmail('leen@mailinator.com');
    $users1->setPassword('paswoord');
    $users1->setcustomerId($customer1);

    $users2 = new Users();
    $users2->setUsername('Oliviervdk');
    $users2->setEmail('olivier@mailinator.com');
    $users2->setPassword('paswoord');
    $users2->setcustomerId($customer2);

    $users3 = new Users();
    $users3->setUsername('elkek');
    $users3->setEmail('elke@mailinator.com');
    $users3->setPassword('paswoord');
    $users3->setcustomerId($customer3);

    $em = $this->getDoctrine()->getManager();

    $em->persist($phone);
    $em->persist($phone1);
    $em->persist($phone2);
    $em->persist($phone3);

    $em->persist($city);
    $em->persist($city1);
    $em->persist($city2);
    $em->persist($city3);

    $em->persist($customer);
    $em->persist($customer1);
    $em->persist($customer2);
    $em->persist($customer3);

    $em->persist($users);
    $em->persist($users1);
    $em->persist($users2);
    $em->persist($users3);
    $em->flush();

    return $this->render('pizzaSiteBundle:User:index.html.twig');

    }


    public function newAction(Request $request)
    {

        $user = new Users();
        $user->setUsername('');
        $user->setEmail('');
        $user->setPassword('');

        $form = $this->createFormBuilder($user)
            ->add->('user', 'string');
            ->add->('save', 'submit', array('label' => 'Login'))
            ->getForm();

        return $this->render('pizzaSiteBundle:User:login.html.twig', array('form' => $form->))


    }

    public function updateAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('pizzaSiteBundle:Users')->find($id);

        if(!$User)
        {
            throw $this->createNotFoundException(
                'No user found for id' .$id
                );
        }

        $user->setUsername('new user');
        $em->persist($user);
        $em->flush();

        return $this->redirect('pizzaSiteBundle:User:index.html.twig', array('user' => $user));

    }

    public fucntion Action
         

}
