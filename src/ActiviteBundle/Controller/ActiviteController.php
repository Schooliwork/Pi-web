<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Activite controller.
 *
 * @Route("/activite")
 */
class ActiviteController extends Controller
{
    /**
     * Lists all activite entities.
     *
     * @Route("/", name="activite_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $activites = $em->getRepository('ActiviteBundle:Activite')->findAll();


        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $activites,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',2)
        );


        return $this->render('activite/index.html.twig', array(
            'activites' => $result,
        ));
    }


    /**
     * Lists all activite entities.
     *
     * @Route("/display", name="activite_display")
     * @Method("GET")
     */
    public function index2Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $activites = $em->getRepository('ActiviteBundle:Activite')->findAll();


        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $activites,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );

        return $this->render('activite/affich.html.twig', array(
            'activites' => $result,
        ));
    }

    /**
     * Creates a new activite entity.
     *
     * @Route("/new", name="activite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $activite = new Activite();
        $form = $this->createForm('ActiviteBundle\Form\ActiviteType', $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
           $file = $activite->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $activite->setPhoto($filename);

            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('activite_index', array('id' => $activite->getId()));
        }

        return $this->render('activite/new.html.twig', array(
            'activite' => $activite,
            'form' => $form->createView(),
        ));

    }


    /**
     * Displays a form to edit an existing activite entity.
     *
     * @Route("/{id}/edit", name="activite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Activite $activite)
    {
        $deleteForm = $this->createDeleteForm($activite);
        $editForm = $this->createForm('ActiviteBundle\Form\ActiviteType', $activite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activite_index', array('id' => $activite->getId()));
        }

        return $this->render('activite/edit.html.twig', array(
            'activite' => $activite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activite entity.
     *
     * @Route("delete/{id}", name="activite_delete")
     * @param Request $request
     * @param Activite $activite
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Activite $activite)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('activite_index');
    }

    /**
     * Creates a form to delete a activite entity.
     *
     * @param Activite $activite The activite entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Activite $activite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activite_delete', array('id' => $activite->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

