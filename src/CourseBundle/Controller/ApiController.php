<?php

namespace CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{

    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();

        $matiere = $em->getRepository('CourseBundle:Matiere')->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($matiere);
        return new JsonResponse($formatted);
    }


}
