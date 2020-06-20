<?php

namespace WallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WallBundle:Default:index.html.twig');
    }
}
