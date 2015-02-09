<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pizza\SiteBundle\Entity\Bestelling;
use pizza\SiteBundle\Form\BestellingType;

/**
 * Bestelling controller.
 *
 */
class BestellingController extends Controller
{

    /**
     * Lists all Bestelling entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('pizzaSiteBundle:Bestelling')->findAll();

        return $this->render('pizzaSiteBundle:Bestelling:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Bestelling entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Bestelling();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bestelling_show', array('id' => $entity->getId())));
        }

        return $this->render('pizzaSiteBundle:Bestelling:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Bestelling entity.
     *
     * @param Bestelling $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bestelling $entity)
    {
        $form = $this->createForm(new BestellingType(), $entity, array(
            'action' => $this->generateUrl('bestelling_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bestelling entity.
     *
     */
    public function newAction()
    {
        $entity = new Bestelling();
        $form   = $this->createCreateForm($entity);

        return $this->render('pizzaSiteBundle:Bestelling:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bestelling entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Bestelling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bestelling entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Bestelling:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bestelling entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Bestelling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bestelling entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Bestelling:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Bestelling entity.
    *
    * @param Bestelling $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bestelling $entity)
    {
        $form = $this->createForm(new BestellingType(), $entity, array(
            'action' => $this->generateUrl('bestelling_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bestelling entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Bestelling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bestelling entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bestelling_edit', array('id' => $id)));
        }

        return $this->render('pizzaSiteBundle:Bestelling:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Bestelling entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pizzaSiteBundle:Bestelling')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bestelling entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bestelling'));
    }

    /**
     * Creates a form to delete a Bestelling entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bestelling_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
