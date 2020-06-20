<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Event;
use EventBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function createAction(Request $request)
    {
        $Event = new Event();
        $form = $this->createForm(EventType::class, $Event);
        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()) {
            $file = $Event->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $Event->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Event);
            $em->flush();
            return $this->redirectToRoute('event_create');

        }
        return $this->render("@Event/Event/create.html.twig", array("f" => $form->createView()));
    }



    public function readAction(Request $request )
    {
        $Event = $this->getDoctrine()->getRepository('EventBundle:Event')->findAll();

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Event,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 1)

        );
        return $this->render('@Event/Event/read.html.twig', array('events' => $result));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Event = $this->getDoctrine()->getRepository(Event::class)->find($id);
        $em->remove($Event);
        $em->flush();

        return $this->redirectToRoute("event_read");
    }


    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Event = $em->getRepository(Event::class)->find($id);

        if ($request->isMethod('POST')) {
            $Event->setTitre($request->get('titre'));
            $Event->setImage($request->get('image'));

            $em->flush();
            return $this->redirectToRoute("event_read");
        }
        return $this->render('@Event/Event/update.html.twig', array('events' => $Event));
    }


    public function afficheAction(Request $request)
    {
        $Event = $this->getDoctrine()->getRepository(Event::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Event,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 1)
        );
        return $this->render('@Event/Event/affiche.html.twig', array('events' => $result));
    }



}
