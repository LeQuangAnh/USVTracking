<?php

try 
{
	
	$client = new SoapClient("http://10.128.8.66/Webservice/USVTrackingToolSupport.asmx?WSDL");

	$param = array( 'userID' => '400195');
	$projects = (array)$client->GetProjectList($param)->GetProjectListResult->Project;
	
	foreach ($projects as $project)
	{
		echo $project->ProjectID;
		echo "->";
		echo $project->ProjectName;
		echo "->";
		echo $project->ProjectStatus;
		echo "<br/>";
	}
}
catch (Exception $e)
{
	echo "<h2>Exception Error!</h2>";
	echo $e->getMessage();
}
