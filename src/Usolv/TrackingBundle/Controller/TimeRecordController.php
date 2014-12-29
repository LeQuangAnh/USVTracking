<?php

namespace Usolv\TrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Usolv\TrackingBundle\Form\Model\TimeRecordSearch;
use Usolv\TrackingBundle\Form\Type\TimeRecordSearchType;
use Doctrine\Common\Collections\ArrayCollection;

class TimeRecordController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsolvTrackingBundle:Default:index.html.twig');
    }

    public function initAction()
    {
    	$project2 = [];
    	$project2["temp1"] = "Tmp1";
    	$project2["temp2"] = "Tmp2";
    	
    	$form = $this->createFormBuilder()
    		->add('projects', 'entity', array(
    				'class' => 'UsolvTrackingBundle:Project',
    				'property' => 'name',
    				'choices' => new ChoiceList(array(1, 0.5), array('Full', 'Half'))
    		))
    		->add('search', 'submit', array('label' => 'Search'))
    		->getForm();
    	
    	return $this->render('UsolvTrackingBundle:TimeRecord:index.html.twig', array(
    			'form' => $form->createView(),
    	));
    }
}
