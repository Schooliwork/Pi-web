<?php

namespace LienBundle\Controller;

use User\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/index_user/{email}/{mtp}")
     */
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

    /**
     * @Route("/afficher_user")
     */
    public function afficherAction()
    {
        $data = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->json($data);

    }
}
