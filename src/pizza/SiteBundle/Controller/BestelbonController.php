<?php

namespace pizza\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use pizza\SiteBundle\Entity\Bestelbon;
use pizza\SiteBundle\Form\BestelbonType;

/**
 * Bestelbon controller.
 *
 */
class BestelbonController extends Controller
{

    /**
     * Lists all Bestelbon entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('pizzaSiteBundle:Bestelbon')->findAll();

        return $this->render('pizzaSiteBundle:Bestelbon:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Bestelbon entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Bestelbon();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bestelbon_show', array('id' => $entity->getId())));
        }

        return $this->render('pizzaSiteBundle:Bestelbon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Bestelbon entity.
     *
     * @param Bestelbon $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bestelbon $entity)
    {
        $form = $this->createForm(new BestelbonType(), $entity, array(
            'action' => $this->generateUrl('bestelbon_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bestelbon entity.
     *
     */
    public function newAction()
    {
        $entity = new Bestelbon();
        $form   = $this->createCreateForm($entity);

        return $this->render('pizzaSiteBundle:Bestelbon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bestelbon entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Bestelbon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bestelbon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Bestelbon:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bestelbon entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Bestelbon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bestelbon entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('pizzaSiteBundle:Bestelbon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Bestelbon entity.
    *
    * @param Bestelbon $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bestelbon $entity)
    {
        $form = $this->createForm(new BestelbonType(), $entity, array(
            'action' => $this->generateUrl('bestelbon_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bestelbon entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('pizzaSiteBundle:Bestelbon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bestelbon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bestelbon_edit', array('id' => $id)));
        }

        return $this->render('pizzaSiteBundle:Bestelbon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Bestelbon entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('pizzaSiteBundle:Bestelbon')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bestelbon entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bestelbon'));
    }

    /**
     * Creates a form to delete a Bestelbon entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bestelbon_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
