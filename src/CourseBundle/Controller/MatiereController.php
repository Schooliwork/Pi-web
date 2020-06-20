<?php

namespace CourseBundle\Controller;

use CourseBundle\Entity\Matiere;
use CourseBundle\Form\MatiereType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MatiereController extends Controller
{

    public function newAction(Request $request) {
        $matiere = new Matiere() ;
        $form =$this->createForm(MatiereType::class, $matiere) ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $em=$this->getDoctrine()->getManager();
            $file= $matiere->getPicture();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );
            $matiere->setPicture($fileName);

            $em->persist($matiere);
            $em->flush();

            return $this->redirectToRoute('matiere_index', array('id' => $matiere->getId()));
        }
        return $this->render('CourseBundle:matiere:new.html.twig', array(
            'matiere' =>$matiere,
            'form'=>$form->createView(),
        ));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $matiere = $this->getDoctrine()->getRepository(Matiere::class)->find($id);
        $em->remove($matiere);
        $em->flush();

        return $this->redirectToRoute("matiere_index");
    }


    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $matiere = $em->getRepository('CourseBundle:Matiere')->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $matiere,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)

        );
        return $this->render('CourseBundle:matiere:index.html.twig', array('matieres'=>$result));
    }

    public function afficheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $matiere = $em->getRepository('CourseBundle:Matiere')->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $matiere,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)

        );
        return $this->render('CourseBundle:matiere:affiche.html.twig', array('matieres'=>$result));
    }


}



