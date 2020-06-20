<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EventBundle\Entity\Commentaire;
use EventBundle\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Request;

class CommentaireController extends  Controller
{
   public function read1Action(Request $request , $id)
    {
        $Commentaire = $this->getDoctrine()->getRepository('EventBundle:Commentaire')->findBy(array('event' => $id));

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Commentaire,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 4)

        );
        return $this->render('@Event/Commentaire/read1.html.twig', array('events' => $result));
    }


    public function create1Action(Request $request)
    {
        $Commentaire = new commentaire();
        $form = $this->createForm(commentaireType::class, $Commentaire);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Commentaire);
            $em->flush();
            return $this->redirectToRoute('event_affiche');
        }
        return $this->render("@Event/Commentaire/create1.html.twig", array("events" => $form->createView()));
    }



    public function delete1Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Commentaire = $this->getDoctrine()->getRepository(Commentaire::class)->find($id);
        $em->remove($Commentaire);
        $em->flush();

        return $this->redirectToRoute("event_affiche");
    }


    public function update1Action(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Commentaire = $em->getRepository(Commentaire::class)->find($id);

        if ($request->isMethod('POST')) {
            $Commentaire->setDescription($request->get('description'));

            $em->flush();
            return $this->redirectToRoute('event_affiche');
        }
        return $this->render('@Event/Commentaire/update1.html.twig', array('comme' => $Commentaire));
    }


   public function affiche1Action(Request $request , $id)
    {
        $Commentaire = $this->getDoctrine()->getRepository('EventBundle:Commentaire')->findBy(array('event' => $id));
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Commentaire,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 4)

        );
        return $this->render('@Event/Commentaire/affiche1.html.twig', array('events' => $result));
    }

}