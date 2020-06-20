<?php

namespace AvisBundle\Controller;

use AvisBundle\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AvisController extends Controller
{
    /**
     * Lists all avis entities.
     *
     * @Route("/", name="avis_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $avis = $em->getRepository('AvisBundle:Avis')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $avis,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',2)
        );

        return $this->render('avis/index.html.twig', array(
            'avis' => $result,
        ));
    }

    /**
     * Lists all avis entities.
     *
     * @Route("/aff", name="avis_aff")
     */
    public function affAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $avis = $em->getRepository('AvisBundle:Avis')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $avis,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        return $this->render('avis/affich.html.twig', array(
            'avis' => $result,
        ));
    }


    /**
     * Creates a new avis entity.
     *
     * @Route("/new", name="avis_new")
     */
    public function newAction(Request $request)
    {
        $avis = new Avis();
        $form = $this->createForm('AvisBundle\Form\AvisType', $avis);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avis);
            $em->flush();
            return $this->redirectToRoute('avis_aff');
        }
        return $this->render('avis/new.html.twig', array('avis' => $avis, 'form' => $form->createView(),
            ));
    }

    /**
     * Finds and displays a avis entity.
     *
     * @Route("/{id}", name="avis_show")
     */
    public function showAction(Avis $avis)
    {
        $deleteForm = $this->createDeleteForm($avis);

        return $this->render('avis/show.html.twig', array(
            'avis' => $avis,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing avis entity.
     *
     * @Route("/{id}/edit", name="avis_edit")
     */
    public function editAction(Request $request, Avis $avis)
    {
        $deleteForm = $this->createDeleteForm($avis);
        $editForm = $this->createForm('AvisBundle\Form\AvisType', $avis);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /** @var UploadedFile $file */
            $file = $avis->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $avis->setPhoto($filename);

            $em = $this->getDoctrine()->getManager();
            $em->persist($avis);
            $em->flush();


            return $this->redirectToRoute('avis_edit', array('id' => $avis->getId()));
        }

        return $this->render('avis/edit.html.twig', array(
            'avis' => $avis,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a avis entity.
     *
     * @Route("delete/{id}", name="avis_delete")
     */
    public function deleteAction(Request $request, Avis $avis)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($avis);
        $em->flush();

        return $this->redirectToRoute('avis_index');
    }

    /**
     * Creates a form to delete a avis entity.
     *
     * @param Avis $avis The avis entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Avis $avis)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avis_delete', array('id' => $avis->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
