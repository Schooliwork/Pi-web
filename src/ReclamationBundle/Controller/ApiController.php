<?php

namespace ReclamationBundle\Controller;

use ReclamationBundle\Entity\reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    public function allAction()
    {
        $reclamations = $this->getDoctrine()->getManager()
            ->getRepository('ReclamationBundle:Reclamation')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamations);
        return new JsonResponse($formatted);
    }

    public function newsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $reclamations = new reclamation();
        $reclamations->setFullName($request->get('fullname'));
        $reclamations->setEmail($request->get('email'));
        $reclamations->setPhone($request->get('phone'));
        $reclamations->setMessage($request->get('message'));
        $em->persist($reclamations);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($reclamations);
        return new JsonResponse($formatted);
    }


}
