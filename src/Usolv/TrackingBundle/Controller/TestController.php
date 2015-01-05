<?php

namespace Usolv\TrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsolvTrackingBundle:Test:ajax.html.twig');
    }
    
    public function ajaxAction(Request $request)
    {
        //$request = $this->get('request');
   		$name = $request->get('name');
   
   		//if the user has written his name
   		if($name!="")
	   	{
	      	$greeting='Hello '.$name.'. How are you today?';
	      	$return=array("responseCode"=>200,  "greeting"=>$greeting);
	   	}
	   	else
	   	{
	      	$return=array("responseCode"=>400, "greeting"=>"You have to write your name!");
	   	}
		
	   	//jscon encode the array
	   	$return = json_encode($return);
	   	//make sure it has the correct content type
	   	return new Response($return,200,array('Content-Type'=>'application/json'));
    }
}
