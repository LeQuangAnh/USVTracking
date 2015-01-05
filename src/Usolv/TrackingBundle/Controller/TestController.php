<?php

namespace Usolv\TrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsolvTrackingBundle:Test:jqgrid.html.twig');
    }
    
    public function jqGridAction(Request $request)
    {
    	$rows = [];
    	$i=0;
    	while($i<=3) {
    		$responce->rows[$i]['id']=$row['userId'];
    		$responce->rows[$i]['cell']=array("ID:1" ,"Name:1","First:1","Last:1");
    		$i++;
    	}
    	
    	return new Response(json_encode($responce),200,array('Content-Type'=>'application/json'));
    }
    
    public function ajaxAction(Request $request)
    {
        //$request = $this->get('request');
   		$name = $request->get('formName');
   
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
