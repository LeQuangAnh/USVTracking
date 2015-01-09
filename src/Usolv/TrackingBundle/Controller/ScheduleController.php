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
		
	/*
	 * Get Data to fill in Schedule Grid 
	 */
	private function GetGridData($projectName)
	{		
		$prevModule = '';
		$prevWbs = '';
		$prevResourceIdx = 0;
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
		  
		  // In case 2 resources assign to one task
		  if ($task['wbs_name'] == $prevWbs)
		  {
		  	$cellTemp[$prevResourceIdx] = $cellTemp[$prevResourceIdx].', '.$task['planresource'];
		  }
		  else
		  {
		  	$prevResourceIdx = $cellIdx;
		  	$cellTemp[$cellIdx++] = ($task['plancost'] <> null) ? $task['planresource'] : '{Undefined}';
		  	$cellTemp[$cellIdx++] = ($task['planstart'] <> null) ? date_format($task['planstart'], 'Y-m-d') : '{Undefined}';
		  	$cellTemp[$cellIdx++] = ($task['planfinish'] <> null) ? date_format($task['planfinish'], 'Y-m-d') : '{Undefined}';
		  	$cellTemp[$cellIdx++] = ($task['plancost'] <> null) ? $task['plancost'] : '{Undefined}';
		  	$cellTemp[$cellIdx++] = '{NoData}';
		  	$cellTemp[$cellIdx++] = '{NoData}';
		  	$cellTemp[$cellIdx++] = '{NoData}';
		  }
		  $prevWbs = $task['wbs_name'];
		  
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
		$colInfo->colNames[$i] = 'Module';
		$colInfo->colModel[$i++] = array(
				'name' => 'module_code',
				'align' => 'center',
				'width' => 100,
				'frozen' => true
		);
		$colInfo->colNames[$i] = 'Name';
		$colInfo->colModel[$i++] = array(
				'name' => 'module_name', 
				'align' => 'center', 
				'width' => 200, 
				'frozen' => true		
		);
		
		foreach ($wbsList as $wbs)
		{
			$wsbname = str_replace(' ', '', strtolower($wbs['name']));			
			$colInfo->groupHeaders[$j++] = array(
					'startColumnName' => $wsbname.'_planresource',
					'numberOfColumns' => 7,
					'titleText' => $wbs['name']
			);
			$colInfo->colNames[$i] = 'Plan Resource';
			$colInfo->colModel[$i++] = array(
			    'name' => $wsbname.'_planresource',
			    'align' => 'center',
			    'width' => 100,
				  'resizable' => false
			);
		  $colInfo->colNames[$i] = 'Plan Start';
		  $colInfo->colModel[$i++] = array(
		  		'name' => $wsbname.'_planstart', 
		  		'align' => 'center', 
		  		'width' => 80,
		  		'resizable' => false
		  );
		  $colInfo->colNames[$i] = 'Plan Finish';
		  $colInfo->colModel[$i++] = array(
		  		'name' => $wsbname.'_planfinish', 
		  		'align' => 'center', 
		  		'width' => 80,
		  		'resizable' => false
		  );
		  $colInfo->colNames[$i] = 'Plan Cost';
		  $colInfo->colModel[$i++] = array(
		  		'name' => $wsbname.'_plancost', 
		  		'align' => 'center', 
		  		'width' => 80,
		  		'resizable' => false
		  );
		  $colInfo->colNames[$i] = 'Actual Start';
		  $colInfo->colModel[$i++] = array(
		      'name' => $wsbname.'_actualstart',
		      'align' => 'center',
		      'width' => 80,
		  		'resizable' => false
		  );
		  $colInfo->colNames[$i] = 'Actual Finish';
		  $colInfo->colModel[$i++] = array(
		      'name' => $wsbname.'_actualfinish',
		      'align' => 'center',
		      'width' => 80,
		  		'resizable' => false
		  );
		  $colInfo->colNames[$i] = 'Actual Cost';
		  $colInfo->colModel[$i++] = array(
		      'name' => $wsbname.'_actualcost',
		      'align' => 'center',
		      'width' => 80,
		  		'resizable' => false
		  );
		}
		
		return $colInfo;
	}
}
