<?php


namespace ReclamationBundle\Controller;


use ReclamationBundle\Entity\Reclamation;
use ReclamationBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ReclamationController extends  Controller
{

    public function readAction(Request $request)
    {
        $Reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Reclamation,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)

        );
        return $this->render('@Reclamation/Reclamation/read.html.twig', array('reclamations' => $result));
    }


    public function createAction(Request $request)
    {
        $Reclamation = new reclamation();
        $form = $this->createForm(ReclamationType::class, $Reclamation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Reclamation);
            $em->flush();
            return $this->redirectToRoute('reclamation_read');
        }
        return $this->render("@Reclamation/Reclamation/create.html.twig", array("recl" => $form->createView()));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->find($id);
        $em->remove($Reclamation);
        $em->flush();

        return $this->redirectToRoute("reclamation_read");
    }


    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Reclamation = $em->getRepository(Reclamation::class)->find($id);

        if ($request->isMethod('POST')) {
            $Reclamation->setFullname($request->get('fullname'));
            $Reclamation->setEmail($request->get('email'));
            $Reclamation->setPhone($request->get('phone'));
            $Reclamation->setMessage($request->get('message'));

            $em->flush();
            return $this->redirectToRoute('reclamation_read');
        }
        return $this->render('@Reclamation/Reclamation/update.html.twig', array('reclamation' => $Reclamation));
    }

    public function afficheAction(Request $request)
    {
        $Reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Reclamation,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        return $this->render('@Reclamation/Reclamation/affiche.html.twig', array('rec' => $result));
    }




    public function rechercheAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $emetteur = ($request->get('emetteur'));
            if (empty($emetteur)) {

                return $this->redirectToRoute('reclamation_affiche');
            } else {

                $Reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->findBy(array('emetteur' => $emetteur));
                return $this->render('@Reclamation/Reclamation/affiche.html.twig', array('f' => $Reclamation));
            }

        }
        return $this->render('@Reclamation/Reclamation/affiche.html.twig');
    }



}