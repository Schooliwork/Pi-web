<?php

namespace WallBundle\Controller;

use WallBundle\Entity\Wall;
use WallBundle\Form\WallType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WallController extends Controller
{
    public function createAction(Request $request)
    {
        $Wall = new Wall();
        $form = $this->createForm(WallType::class, $Wall);
        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()) {
            $file = $Wall->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $Wall->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Wall);
            $em->flush();
            return $this->redirectToRoute('wall_read');

        }
        return $this->render("@Wall/Wall/create.html.twig", array("f" => $form->createView()));
    }

    public function createeAction(Request $request)
    {
        $Wall = new Wall();
        $form = $this->createForm(WallType::class, $Wall);
        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()) {
            $file = $Wall->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $Wall->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Wall);
            $em->flush();
            return $this->redirectToRoute('wall_read');

        }
        return $this->render("@Wall/Wall/createe.html.twig", array("f" => $form->createView()));
    }



    public function readAction(Request $request )
    {
        $Wall = $this->getDoctrine()->getRepository('WallBundle:Wall')->findAll();

        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Wall,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 1)

        );
        return $this->render('@Wall/Wall/read.html.twig', array('walls' => $result));
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Wall = $this->getDoctrine()->getRepository(Wall::class)->find($id);
        $em->remove($Wall);
        $em->flush();

        return $this->redirectToRoute("wall_read");
    }

    public function deleteeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Wall = $this->getDoctrine()->getRepository(Wall::class)->find($id);
        $em->remove($Wall);
        $em->flush();

        return $this->redirectToRoute("wall_affiche");
    }


    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Wall = $em->getRepository(Wall::class)->find($id);

        if ($request->isMethod('POST')) {
            $Wall->setContenu($request->get('contenu'));
            $Wall->setImage($request->get('image'));

            $em->flush();
            return $this->redirectToRoute("wall_read");
        }
        return $this->render('@Wall/Wall/update.html.twig', array('walls' => $Wall));
    }

    public function updateeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Wall = $em->getRepository(Wall::class)->find($id);

        if ($request->isMethod('POST')) {
            $Wall->setContenu($request->get('contenu'));
            $Wall->setImage($request->get('image'));

            $em->flush();
            return $this->redirectToRoute("wall_affiche");
        }
        return $this->render('@Wall/Wall/updatee.html.twig', array('walls' => $Wall));
    }


    public function afficheAction(Request $request)
    {
        $Wall = $this->getDoctrine()->getRepository(Wall::class)->findAll();
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $Wall,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 1)
        );
        return $this->render('@Wall/Wall/affiche.html.twig', array('walls' => $result));
    }



}
