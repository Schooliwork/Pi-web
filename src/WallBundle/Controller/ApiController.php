<?php

namespace WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    public function allAction()
    {
        $Wall = $this->getDoctrine()->getManager()
            ->getRepository('WallBundle:Wall')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Wall);
        return new JsonResponse($formatted);
    }


}
