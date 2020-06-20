<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Participant;
use EventBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;

class ApiController extends Controller
{
    public function alleAction()
    {
        $Event = $this->getDoctrine()->getManager()
            ->getRepository('EventBundle:Event')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Event);
        return new JsonResponse($formatted);
    }

    public function allsAction()
    {
        $Event1 = $this->getDoctrine()->getManager()
            ->getRepository('EventBundle:Event1')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Event1);
        return new JsonResponse($formatted);
    }

    public function allssAction()
    {
        $Commentaire = $this->getDoctrine()->getManager()
            ->getRepository('EventBundle:Commentaire')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Commentaire);
        return new JsonResponse($formatted);
    }


    public function newssAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Commentaire = new Commentaire();
        $Commentaire->setDescription($request->get('description'));
        $em->persist($Commentaire);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Commentaire);
        return new JsonResponse($formatted);
    }





    public function updateCAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $Commentaire = $em->getRepository(Commentaire::class)->find($id);
        $Commentaire->setId($request->get('id'));
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        return new JsonResponse($serializer->normalize($Commentaire));

    }

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $participants = new Participant();
        $participants->setNom($request->get('nom'));
        $participants->setPrenom($request->get('prenom'));
        $participants->setNum($request->get('num'));
        $em->persist($participants);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($participants);
        return new JsonResponse($formatted);
    }



    public function indexxAction($id)
    {
        $Event1 = $this->getDoctrine()->getManager()
            ->getRepository('EventBundle:Event1')
            ->findBy(array('event' => $id));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Event1);
        return new JsonResponse($formatted);
    }

    public function indexxxAction($id)
    {
        $Commentaire = $this->getDoctrine()->getManager()
            ->getRepository('EventBundle:Commentaire')
            ->findBy(array('event' => $id));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Commentaire);
        return new JsonResponse($formatted);
    }


    public function iindexxxAction($id)
    {
        $Participant = $this->getDoctrine()->getManager()
            ->getRepository('EventBundle:Participant')
            ->findBy(array('event' => $id));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Participant);
        return new JsonResponse($formatted);
    }


    function suppAction(Request $request, $id){


        $em=$this->getDoctrine()->getManager();
        $commentaire=$em->getRepository(Commentaire::class)
            ->find($id);
        $em->remove($commentaire);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($commentaire);
        return new JsonResponse($formatted);

    }


    public function indexAction($email,$mtp)
    {
        $data = [];
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["email"=>$email]);
        if($user!=null)
        {
            $encoder_service = $this->get('security.encoder_factory');
            $encoder_service= $encoder_service->getEncoder($user);
            $valide = $encoder_service->isPasswordValid($user->getPassword(), $mtp,$user->getSalt());
            if($valide)
                array_push( $data,$user);
        }
        return $this->json($data);


    }
}

