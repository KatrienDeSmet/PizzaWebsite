<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pizza\SiteBundle\Entity\Korting;
use pizza\SiteBundle\Form\KortingType;

/**
 * Korting controller.
 *
 */
class KortingController extends Controller
{

    /**
     * Lists all Korting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('pizzaSiteBundle:Korting')->findAll();

        return $this->render('pizzaSiteBundle:Korting:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Korting entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Korting();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('korting_show', array('id' => $entity->getId())));
        }

        return $this->render('pizzaSiteBundle:Korting:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Korting entity.
     *
     * @param Korting $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Korting $entity)
    {
        $form = $this->createForm(new KortingType(), $entity, array(
            'action' => $this->generateUrl('korting_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Korting entity.
     *
     */
    public function newAction()
    {
        $entity = new Korting();
        $form   = $this->createCreateForm($entity);

        return $this->render('pizzaSiteBundle:Korting:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Korting entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Korting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Korting entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Korting:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Korting entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Korting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Korting entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Korting:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Korting entity.
    *
    * @param Korting $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Korting $entity)
    {
        $form = $this->createForm(new KortingType(), $entity, array(
            'action' => $this->generateUrl('korting_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Korting entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Korting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Korting entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('korting_edit', array('id' => $id)));
        }

        return $this->render('pizzaSiteBundle:Korting:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Korting entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pizzaSiteBundle:Korting')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Korting entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('korting'));
    }

    /**
     * Creates a form to delete a Korting entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('korting_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
