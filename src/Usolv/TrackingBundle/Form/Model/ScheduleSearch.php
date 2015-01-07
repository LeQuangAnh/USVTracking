<?php

namespace Usolv\TrackingBundle\Form\Model;

class ScheduleSearch
{
	protected $project;
	
	protected $module;
	
	protected $user;

	public function setProject($project)
	{
		$this->project = $project;
	
		return $this;
	}

	public function getProject()
	{
		return $this->project;
	}
	
	public function setModule($module)
	{
		$this->module = $module;
	
		return $this;
	}
	
	public function getModule()
	{
		return $this->module;
	}
	
	public function setUser($user)
	{
		$this->user = $user;
	
		return $this;
	}
	
	public function getUser()
	{
		return $this->user;
	}
}
