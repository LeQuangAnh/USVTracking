<?php

namespace Usolv\TrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsolvTrackingBundle:Default:index.html.twig');
    }
    
    public function test(Request $request)
    {
    	//$request = $this->get('request');
    	$name=$request->request->get('formName');
    	 
    	if($name!=""){
    		$greeting='Hello '.$name.'. How are you today?';
    		$return=array("responseCode"=>200,  "greeting"=>$greeting);
    	}
    	else{
    		$return=array("responseCode"=>400, "greeting"=>"You have to write your name!");
    	}
    	
    	$return=json_encode($return);
    	return new Response($return,200,array('Content-Type'=>'application/json'));
    }
}
