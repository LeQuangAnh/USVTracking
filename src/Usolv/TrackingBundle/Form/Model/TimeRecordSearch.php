<?php

namespace Usolv\TrackingBundle\Form\Model;

use Doctrine\Common\Collections\ArrayCollection;

class TimeRecordSearch
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
