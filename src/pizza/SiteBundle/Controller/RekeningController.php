<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pizza\SiteBundle\Entity\Rekening;
use pizza\SiteBundle\Form\RekeningType;

/**
 * Rekening controller.
 *
 */
class RekeningController extends Controller
{

    /**
     * Lists all Rekening entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('pizzaSiteBundle:Rekening')->findAll();

        return $this->render('pizzaSiteBundle:Rekening:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Rekening entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Rekening();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rekening_show', array('id' => $entity->getId())));
        }

        return $this->render('pizzaSiteBundle:Rekening:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rekening entity.
     *
     * @param Rekening $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rekening $entity)
    {
        $form = $this->createForm(new RekeningType(), $entity, array(
            'action' => $this->generateUrl('rekening_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rekening entity.
     *
     */
    public function newAction()
    {
        $entity = new Rekening();
        $form   = $this->createCreateForm($entity);

        return $this->render('pizzaSiteBundle:Rekening:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rekening entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Rekening')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rekening entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Rekening:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rekening entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Rekening')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rekening entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Rekening:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Rekening entity.
    *
    * @param Rekening $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rekening $entity)
    {
        $form = $this->createForm(new RekeningType(), $entity, array(
            'action' => $this->generateUrl('rekening_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Rekening entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Rekening')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rekening entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('rekening_edit', array('id' => $id)));
        }

        return $this->render('pizzaSiteBundle:Rekening:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Rekening entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pizzaSiteBundle:Rekening')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rekening entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rekening'));
    }

    /**
     * Creates a form to delete a Rekening entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rekening_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
