<?php

namespace PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PlanningBundle:Default:index.html.twig');
    }
}
