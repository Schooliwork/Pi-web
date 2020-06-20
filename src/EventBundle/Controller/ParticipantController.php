<?php


namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EventBundle\Entity\Participant;
use EventBundle\Form\ParticipantType;

class ParticipantController extends  Controller
{

    public function readPAction($id)
    {
        $Participant = $this->getDoctrine()->getRepository('EventBundle:Participant')->findBy(array('event' => $id));

        return $this->render('@Event/Participant/readP.html.twig', array('par' => $Participant));
    }


    public function createPAction(Request $request)
    {
        $Participant = new Participant();
        $form = $this->createForm(ParticipantType::class, $Participant);
        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($Participant);
            $em->flush();
            return $this->redirectToRoute('event_affiche');

        }
        return $this->render("@Event/Participant/createP.html.twig", array("part" => $form->createView()));
    }



}