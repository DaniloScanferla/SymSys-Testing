<?php

namespace WMS\EstoqueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WMS\EstoqueBundle\Entity\PurchaseOrder;
use WMS\EstoqueBundle\Form\PurchaseOrderType;

/**
 * PurchaseOrder controller.
 *
 */
class PurchaseOrderController extends Controller
{

    /**
     * Lists all PurchaseOrder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WMSEstoqueBundle:PurchaseOrder')->findAll();

        return $this->render('WMSEstoqueBundle:PurchaseOrder:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PurchaseOrder entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PurchaseOrder();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseorder_show', array('id' => $entity->getId())));
        }

        return $this->render('WMSEstoqueBundle:PurchaseOrder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PurchaseOrder entity.
     *
     * @param PurchaseOrder $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PurchaseOrder $entity)
    {
        $form = $this->createForm(new PurchaseOrderType(), $entity, array(
            'action' => $this->generateUrl('purchaseorder_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PurchaseOrder entity.
     *
     */
    public function newAction()
    {
        $entity = new PurchaseOrder();
        $form   = $this->createCreateForm($entity);

        return $this->render('WMSEstoqueBundle:PurchaseOrder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseOrder entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WMSEstoqueBundle:PurchaseOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WMSEstoqueBundle:PurchaseOrder:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PurchaseOrder entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WMSEstoqueBundle:PurchaseOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WMSEstoqueBundle:PurchaseOrder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PurchaseOrder entity.
    *
    * @param PurchaseOrder $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PurchaseOrder $entity)
    {
        $form = $this->createForm(new PurchaseOrderType(), $entity, array(
            'action' => $this->generateUrl('purchaseorder_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PurchaseOrder entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WMSEstoqueBundle:PurchaseOrder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('purchaseorder_edit', array('id' => $id)));
        }

        return $this->render('WMSEstoqueBundle:PurchaseOrder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PurchaseOrder entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WMSEstoqueBundle:PurchaseOrder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PurchaseOrder entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('purchaseorder'));
    }

    /**
     * Creates a form to delete a PurchaseOrder entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('purchaseorder_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
