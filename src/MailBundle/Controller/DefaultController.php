<?php

namespace MailBundle\Controller;

use MailBundle\Entity\Mail;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('homepage.html.twig');
    }

    public function sendMailAction(Request $request)
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

        return $this->render('MailBundle:Default:sendMail.html.twig',
            array('f' => $form->createView()));
    }
}
