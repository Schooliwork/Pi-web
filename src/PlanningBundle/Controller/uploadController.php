<?php


namespace PlanningBundle\Controller;


use PlanningBundle\Entity\upload;
use PlanningBundle\Form\uploadType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use const http\Client\Curl\POSTREDIR_301;

class uploadController extends Controller
{

    public function new1Action(Request $request) {
        $upload = new upload() ;
        $form =$this->createForm(uploadType::class, $upload) ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $em=$this->getDoctrine()->getManager();
            $file= $upload->getPicture();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );
            $upload->setPicture($fileName);

            $em->persist($upload);
            $em->flush();

            return $this->redirectToRoute('upload_show', array('id' => $upload->getId()));
        }
        return $this->render('PlanningBundle:upload:new1.html.twig', array(
            'upload' =>$upload,
            'form'=>$form->createView(),
        ));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $upload = $this->getDoctrine()->getRepository(upload::class)->find($id);
        $em->remove($upload);
        $em->flush();

        return $this->redirectToRoute("upload_show");
    }


    public function showAction(Request $request)
    {
        $upload = $this->getDoctrine()->getRepository(upload::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $upload,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)

        );

        return $this->render('PlanningBundle:upload:show.html.twig', array('uploads'=>$result));
    }

   /* public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $upload = $this->getDoctrine()->getRepository(upload::class)->findAll();
        if($request->isMethod('POST')){
            $classe=$request->get('classe');
            $upload = $em->getRepository("PlanningBundle:upload")->findBy(array("classe"=>$classe));
        }
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $upload,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)

        );

        return $this->render('@Planning/upload/show.html.twig', array('uploads' => $result));

    }*/

    public function affiche2Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $upload = $this->getDoctrine()->getRepository(upload::class)->findAll();
        if($request->isMethod('POST')){
            $classe=$request->get('classe');
            $upload = $em->getRepository("PlanningBundle:upload")->findBy(array("classe"=>$classe));
        }
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $upload,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)

        );

        return $this->render('@Planning/upload/affiche2.html.twig', array('recherche' => $result));

    }




}