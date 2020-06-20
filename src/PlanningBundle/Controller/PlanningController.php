<?php

namespace PlanningBundle\Controller;

use PlanningBundle\Entity\Planning;
use PlanningBundle\Form\PlanningType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanningController extends Controller
{
    public function read2Action(Request $request)
    {
        $Planning = $this->getDoctrine()->getRepository(Planning::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Planning,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 1)

        );
        return $this->render('@Planning/Planning/read2.html.twig', array('plann' => $result));
    }


    public function create2Action(Request $request)
    {
        $Planning = new Planning();
        $form = $this->createForm(PlanningType::class, $Planning);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Planning);
            $em->flush();
            return $this->redirectToRoute('planning_read2');
        }
        return $this->render("@Planning/Planning/create2.html.twig", array("p" => $form->createView()));
    }


    public function update2Action(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Planning = $em->getRepository(Planning::class)->find($id);

        if ($request->isMethod('POST')) {
            $Planning->setNiveau($request->get('niveau'));
            $Planning->setMatiere1($request->get('matiere1'));
            $Planning->setMatiere2($request->get('matiere2'));
            $Planning->setMatiere3($request->get('matiere3'));
            $Planning->setMatiere4($request->get('matiere4'));
            $Planning->setMatiere5($request->get('matiere5'));
            $Planning->setMatiere6($request->get('matiere6'));
            $Planning->setMatiere7($request->get('matiere7'));
            $Planning->setMatiere8($request->get('matiere8'));
            $Planning->setMatiere9($request->get('matiere9'));
            $Planning->setActivite1($request->get('activite1'));
            $Planning->setActivite2($request->get('activite2'));
            $Planning->setActivite3($request->get('activite3'));
            $Planning->setActivite4($request->get('activite4'));
            $Planning->setActivite5($request->get('activite5'));
            $Planning->setActivite6($request->get('activite6'));
            $Planning->setActivite7($request->get('activite7'));

            $em->flush();
            return $this->redirectToRoute('planning_read2');
        }
        return $this->render('@Planning/Planning/update2.html.twig', array('pl' => $Planning));
    }


    public function delete2Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Planning = $this->getDoctrine()->getRepository(Planning::class)->find($id);
        $em->remove($Planning);
        $em->flush();

        return $this->redirectToRoute("planning_read2");
    }


    public function pdfAction($id)

    {
        $planning = $this->getDoctrine()->getRepository('PlanningBundle:Planning')->findBy(array('id' => $id));

        //$planning = $this->getDoctrine()->getRepository(Planning::class)->findBy(array('niveau' => $niveau));
        $snappy = $this->get('knp_snappy.pdf');
        $html = $this->render('@Planning/Planning/pdf.html.twig', array('planning' => $planning)
        );
        $filename = 'SnappyPDF';
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '.pdf"'
            )
        );
    }

}