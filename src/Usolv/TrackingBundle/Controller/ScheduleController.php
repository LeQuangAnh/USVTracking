<?php

namespace Usolv\TrackingBundle\Controller;

use Doctrine\ORM\Query;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;

use Usolv\TrackingBundle\Entity\TaskRepository;
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
		$projectName = $request->get('project');

		$response->colData->rows[0] = array();				
		$response->colData->rows = $this->GetGridData($projectName);
		
		$colInfo = $this->GetGridColumnInfo($projectName);
		$response->colNames = $colInfo->colNames;
		$response->colModel = $colInfo->colModel;
		$response->groupHeaders = $colInfo->groupHeaders;
	
		return new Response(
				json_encode($response),
				Response::HTTP_OK,
				array('Content-Type'=>'application/json'));
	}

	/**
	 * @Route("/test", name="_schedule-test")
	 */
		
	private function GetGridData($projectName)
	{		
		$prevModule = '';
		$rows = [];
		$rowIdx = 0;
		$cellIdx = 0;
		$rowTemp = [];
		$cellTemp = [];

		$em = $this->getDoctrine()->getManager();
		$taskList = $em->getRepository('UsolvTrackingBundle:Task')
		  ->findByProject($projectName);

		foreach ($taskList as $task)
		{
		  if ($task['module_name'] <> $prevModule)
		  {
		    if ($prevModule <> '')
		    {
		      $rowTemp['cell'] = $cellTemp;
		      $rows[$rowIdx++] = $rowTemp;

          // Reset temporary variables
		      $rowTemp = [];
		      $cellTemp = [];
		      $cellIdx = 0;
		    }
		    $prevModule = $task['module_name'];
		    $rowTemp['id'] = $task['module_id'];
		    $cellTemp[$cellIdx++] = $task['module_code'];
		    $cellTemp[$cellIdx++] = $task['module_name'];
		  }
		  
		  $cellTemp[$cellIdx++] = ($task['planstart'] <> null) ? date_format($task['planstart'], 'Y-m-d') : '{Undefined}';
		  $cellTemp[$cellIdx++] = ($task['planfinish'] <> null) ? date_format($task['planfinish'], 'Y-m-d') : '{Undefined}';
		  $cellTemp[$cellIdx++] = ($task['plancost'] <> null) ? $task['plancost'] : '{Undefined}';
		}
		
		// Store last row
		$rowTemp['cell'] = $cellTemp;
		$rows[$rowIdx++] = $rowTemp;

		return $rows;
	}
	
	private function GetGridColumnInfo($projectName)
	{
		$em = $this->getDoctrine()->getManager();
		$wbsList = $em->getRepository('UsolvTrackingBundle:Wbs')
		  ->findByProjectAutoOrdered($projectName);

		// Get Column Name, Model, Group Header
		$i = 0;
		$j = 0;
		$colInfo->colNames[$i] = 'Module Code';
		$colInfo->colModel[$i++] = array(
				'name' => 'module_code',
				'align' => 'center',
				'width' => '100',
				'frozen' => true);
		$colInfo->colNames[$i] = 'Module Name';
		$colInfo->colModel[$i++] = array(
				'name' => 'module_name', 
				'align' => 'center', 
				'width' => '200', 
				'frozen' => true);
		
		foreach ($wbsList as $wbs)
		{
			$wsbname = str_replace(' ', '', strtolower($wbs['name'])).'_planstart';			
			$colInfo->groupHeaders[$j++] = array(
					'startColumnName' => $wsbname.'_planstart',
					'numberOfColumns' => 3,
					'titleText' => $wbs['name']
			);
		  $colInfo->colNames[$i] = 'Plan Start';
		  $colInfo->colModel[$i++] = array(
		  		'name' => $wsbname.'_planstart', 
		  		'align' => 'center', 
		  		'width' => '100');
		  $colInfo->colNames[$i] = 'Plan Finish';
		  $colInfo->colModel[$i++] = array(
		  		'name' => $wsbname.'_planfinish', 
		  		'align' => 'center', 
		  		'width' => '100');
		  $colInfo->colNames[$i] = 'Plan Cost';
		  $colInfo->colModel[$i++] = array(
		  		'name' => $wsbname.'_plancost', 
		  		'align' => 'center', 
		  		'width' => '100');
		}
		
		return $colInfo;
	}
}
