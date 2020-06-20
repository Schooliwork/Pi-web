<?php

namespace MeetingBundle\Controller;

use MeetingBundle\Entity\Meeting;
use MeetingBundle\Form\MeetingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MeetingController extends Controller
{
    public function readAction(Request $request)
    {
        $Meeting = $this->getDoctrine()->getRepository(Meeting::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Meeting,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        return $this->render('@Meeting/Meeting/read.html.twig', array('meetings' => $result));
    }

    public function createAction(Request $request)
    {
        $Meeting = new Meeting();
        $form = $this->createForm(MeetingType::class, $Meeting);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Meeting);
            $em->flush();
            return $this->redirectToRoute('meeting_read');
        }
        return $this->render("@Meeting/Meeting/create.html.twig", array("meet" => $form->createView()));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Meeting= $this->getDoctrine()->getRepository(Meeting::class)->find($id);
        $em->remove($Meeting);
        $em->flush();

        return $this->redirectToRoute("meeting_read");
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Meeting = $em->getRepository(Meeting::class)->find($id);

        if ($request->isMethod('POST')) {
            $Meeting->setEmetteur($request->get('emetteur'));
            $Meeting->setRecepteur($request->get('recepteur'));
            $Meeting->setSujet($request->get('sujet'));
            $Meeting->setDescription($request->get('description'));


            $em->flush();
            return $this->redirectToRoute('meeting_read');
        }
        return $this->render('@Meeting/Meeting/update.html.twig', array('meeting' => $Meeting));
    }

    public function afficheAction(Request $request)
    {
        $Meeting = $this->getDoctrine()->getRepository(Meeting::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Meeting,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        return $this->render('@Meeting/Meeting/affiche.html.twig', array('mee' => $result));
    }

}
