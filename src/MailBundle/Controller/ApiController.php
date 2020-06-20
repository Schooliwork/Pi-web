<?php

namespace MailBundle\Controller;

use MailBundle\Entity\Mail;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    public function sendAction(Request $request)
    {
        $mail = new Mail();
        $form = $this->createForm('MailBundle\Form\MailType', $mail);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $subject = $mail->getSubject();
            $mail = $mail->getMail();
            $object = "Bonjour, une réunion est planifiée ...";
            $username = 'mahdhiasma351@gmail.com';
            $message = Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($username)
                ->setTo($mail)
                ->setBody($object);
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('notice','Mail successfully sent !');

        }

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($mail);
        return new JsonResponse($formatted);
    }

}
