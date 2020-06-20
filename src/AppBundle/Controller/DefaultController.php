<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/homepage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @return Response
     *
     * @Route("/admin/",name="admins_page")
     */
    public function adminsPageAction()
    {

        $em=$this->getDoctrine()->getManager();
        $query= $em->createQuery('delete EventsBundle:Event1 e where e.date<current_date()');
        $query->execute();
        return $this->render('admins.html.twig');
    }

    /**
     * @return Response
     *
     * @Route("/user/",name="user_page")
     */
    public function userPageAction()
    {
        return $this->render('user.html.twig');
    }


    /**
     * @return Response
     *
     *
     * @Route("/about/", name="about_page")
     */
    public function aboutPageAction()
    {
        return $this->render('about.html.twig');
    }



    /**
     * @return Response
     *
     *
     * @Route("/login1/", name="login1_page")
     */
    public function login1PageAction()
    {
        return $this->render('login1.html.twig');
    }

    /**
     * @return Response
     *
     * @Route("/admin/",name="admins_page")
     */
    public function admin1PageAction()
    {

        return $this->render('admins.html.twig');
    }

}
