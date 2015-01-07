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
use Usolv\TrackingBundle\Form\Model\ScheduleSearch;
use Usolv\TrackingBundle\Form\Type\ScheduleSearchType;

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
		$scheduleSearch = new ScheduleSearch();
		
		$form = $this->createForm(new ScheduleSearchType(), $scheduleSearch, array(
				'action' => $this->generateUrl('_schedule-search'),
				'method' => 'POST',
		));
			
		return $this->render('UsolvTrackingBundle:Schedule:search.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	/**
	 * @Route("/search", name="_schedule-search")
	 * @Method("POST")	 
	 */
	public function searchAction(Request $request)
	{
			$project = $request->get('project');
			
   		$repository = $this->getDoctrine()->getRepository('UsolvTrackingBundle:Task');
   		$query = $repository->createQueryBuilder('t')
   			->where('t.project_name = :project_name')
   			->setParameter('project_name', $project)
   			->getQuery();
   		
   		$tasks = $query->getResult();

   		$rows = [];
   		$i = 0;
   		foreach ($tasks as $task)
   		{
   			$responce->rows[$i]['id'] = $task->getId();
   			$responce->rows[$i]['cell'] = array(
   					$task->getModule()->getName(), 
   					$task->getWbs()->getName(),
   					date_format($task->getPlanstart(), 'Y-m-d'),
   					date_format($task->getPlanfinish(), 'Y-m-d'),
   					$task->getPlancost(),
   			);
   			$i++;
   		}
   		 
   		return new Response(
   				json_encode($responce),
   				Response::HTTP_OK,
   				array('Content-Type'=>'application/json'));
	}
}
