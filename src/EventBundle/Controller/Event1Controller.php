<?php

namespace EventBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EventBundle\Entity\Event1;
use EventBundle\Form\Event1Type;
use EventBundle\Form\CalendarType;
use DateTime;

class Event1Controller extends Controller
{
    public function read0Action($id)
    {

        $Event1 = $this->getDoctrine()->getRepository('EventBundle:Event1')->findBy(array('event' => $id));

        return $this->render('@Event/Event1/read0.html.twig', array('events' => $Event1));

    }

    public function create0Action(Request $request)
    {
        $Event1 = new Event1();
        $form = $this->createForm(Event1Type::class, $Event1);
        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($Event1);
            $em->flush();
            return $this->redirectToRoute('event_read');

        }
        return $this->render("@Event/Event1/create0.html.twig", array("form" => $form->createView()));
    }


    public function update0Action(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Event1 = $em->getRepository(Event1::class)->find($id);

        if ($request->isMethod('POST')) {
            $Event1->setDate(new DateTime($request->get('date')));
            $Event1->setType($request->get('type'));
            $Event1->setLieu($request->get('lieu'));
            $Event1->setPrix($request->get('prix'));
            $Event1->setDetails($request->get('details'));

            $em->flush();
            return $this->redirectToRoute('event_read');
        }
        return $this->render('@Event/Event1/update0.html.twig', array('events' => $Event1));
    }


    public function delete0Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Event1 = $this->getDoctrine()->getRepository(Event1::class)->find($id);
        $em->remove($Event1);
        $em->flush();

        return $this->redirectToRoute("event_read");
    }




    public function statistiqueAction()
    {
        /** @var TYPE_NAME $pieChart */
        $pieChart = new PieChart();
        $em = $this->getDoctrine();
        $evenements = $em ->getRepository(Event1::class)->findAll();
        $totalEvent=0;
        foreach ($evenements as $event){
            $totalEvent = $totalEvent+$event->getId();
        }
        $data = array();
        $stat = ['event' , 'id'];
        $nb = 0;
        array_push($data , $stat);
        foreach ($evenements as $event){
            $stat= array();
            array_push($stat,$event->getType(),(($event->getId())*100)/$totalEvent);
            $nb=($event->getId()*100)/$totalEvent;
            $stat=[$event->getType(),$nb];
            array_push($data,$stat);
        }
        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Percentages of events by type');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('@Event\Event1\statistique.html.twig', array('piechart'=>$pieChart));
    }


    public function calendarAction(Request $request)
    {
        $Event1 = $this->getDoctrine()->getRepository(Event1::class)->findAll();
        return $this->render('@Event/Event1/calendar.html.twig', array(' ' => $Event1));
    }

    public function affiche0Action( $id)
    {


        $Event1 = $this->getDoctrine()->getRepository('EventBundle:Event1')->findBy(array('event' => $id));


        return $this->render('@Event/Event1/affiche0.html.twig', array('events' => $Event1));
    }

}
