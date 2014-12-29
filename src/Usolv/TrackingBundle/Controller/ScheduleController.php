<?php

namespace Usolv\TrackingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use Usolv\TrackingBundle\Form\Model\Schedule;
use Usolv\TrackingBundle\Form\Type\ScheduleType;

/**
 * @Route("/schedule")
 */
class ScheduleController extends Controller
{
	/**
	 * @Route("/", name="_schedule")
	 */
	public function initAction(Request $request)
	{
		$schedule = new Schedule();
		//$tasks = null;
		
		$form = $this->createForm(new ScheduleType(), $schedule, array(
				'action' => $this->generateUrl('_schedule-search'),
		));
			
		return $this->render('UsolvTrackingBundle:Schedule:search.html.twig', array(
			'form' => $form->createView(),
			//'tasks' => $tasks,
		));
	}
	
	/**
	 * @Route("/search", name="_schedule-search")
	 */
	public function searchAction(Request $request)
	{   		
   		$em = $this->getDoctrine()->getManager();
   		$tasks = $em->getRepository('UsolvTrackingBundle:Task')
   		->findAllByProject('M14_NGIT_SLD_Jul_Tracking1');

	   	//make sure it has the correct content type
   		return new Response(
   				json_encode($tasks),
   				Response::HTTP_OK,
   				array('Content-Type'=>'application/json'));   
	}
	
	/*
	 * @Route("/search", name="_schedule-search")
	 * @Method({"POST"})
	 *
	public function searchAction(Request $request)
	{
		$schedule = new Schedule();
		$tasks = null;
		$response = null;
	
		$form = $this->createForm(new ScheduleType(), $schedule);
	
		$form->handleRequest($request);
	
		if ($form->isSubmitted() && $form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$tasks = $em->getRepository('UsolvTrackingBundle:Task')
			->findAllByProject($schedule->getProject()->getName());
			$response = new Response(json_encode($tasks), Response::HTTP_OK);
			$response->headers->set('Content-Type', 'application/json');
				
		}
	
		return $response;
	}*/
}
