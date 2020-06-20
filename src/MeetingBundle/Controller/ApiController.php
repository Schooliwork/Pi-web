<?php

namespace MeetingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    public function allAction()
    {
        $meetings = $this->getDoctrine()->getManager()
            ->getRepository('MeetingBundle:Meeting')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($meetings);
        return new JsonResponse($formatted);
    }

}
