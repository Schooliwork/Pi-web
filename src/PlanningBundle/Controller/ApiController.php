<?php


namespace PlanningBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{

    public function alluAction()
    {
        $em = $this->getDoctrine()->getManager();
        $upload = $em->getRepository('PlanningBundle:upload')->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($upload);
        return new JsonResponse($formatted);
    }
}