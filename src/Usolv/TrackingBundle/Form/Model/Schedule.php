<?php

namespace Usolv\TrackingBundle\Form\Model;

class Schedule
{
	protected $project;

	public function setProject($project)
	{
		$this->project = $project;
	
		return $this;
	}

	public function getProject()
	{
		return $this->project;
	}
}
