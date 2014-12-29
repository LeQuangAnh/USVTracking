<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="Usolv\TrackingBundle\Entity\TaskRepository")
 */
class Task
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $project_name;
	
	/**
	 * @ORM\Column(type="string", length=30)
	 */
	protected $module_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $wbs_id;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $planstart;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $planfinish;
	
	/**
	 * @ORM\Column(type="decimal")
	 */
	protected $plancost;
	
	/**
	 * @ORM\Column(type="boolean", options={"default":0})
	 */
	protected $iscancelled;
	
	/**
	 * @ORM\Column(type="boolean", options={"default":0})
	 */
	protected $delflag;
	
	/**
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="tasks")
	 */
	private $users;
	
	public function __construct()
	{
		$this->users = new ArrayCollection();
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set project_name
     *
     * @param string $projectName
     * @return Task
     */
    public function setProjectName($projectName)
    {
        $this->project_name = $projectName;

        return $this;
    }

    /**
     * Get project_name
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->project_name;
    }

    /**
     * Set module_id
     *
     * @param string $moduleId
     * @return Task
     */
    public function setModuleId($moduleId)
    {
        $this->module_id = $moduleId;

        return $this;
    }

    /**
     * Get module_id
     *
     * @return string 
     */
    public function getModuleId()
    {
        return $this->module_id;
    }

    /**
     * Set wbs_id
     *
     * @param integer $wbsId
     * @return Task
     */
    public function setWbsId($wbsId)
    {
        $this->wbs_id = $wbsId;

        return $this;
    }

    /**
     * Get wbs_id
     *
     * @return integer 
     */
    public function getWbsId()
    {
        return $this->wbs_id;
    }

    /**
     * Set planstart
     *
     * @param \DateTime $planstart
     * @return Task
     */
    public function setPlanstart($planstart)
    {
        $this->planstart = $planstart;

        return $this;
    }

    /**
     * Get planstart
     *
     * @return \DateTime 
     */
    public function getPlanstart()
    {
        return $this->planstart;
    }

    /**
     * Set planfinish
     *
     * @param \DateTime $planfinish
     * @return Task
     */
    public function setPlanfinish($planfinish)
    {
        $this->planfinish = $planfinish;

        return $this;
    }

    /**
     * Get planfinish
     *
     * @return \DateTime 
     */
    public function getPlanfinish()
    {
        return $this->planfinish;
    }

    /**
     * Set plancost
     *
     * @param string $plancost
     * @return Task
     */
    public function setPlancost($plancost)
    {
        $this->plancost = $plancost;

        return $this;
    }

    /**
     * Get plancost
     *
     * @return string 
     */
    public function getPlancost()
    {
        return $this->plancost;
    }

    /**
     * Set iscancelled
     *
     * @param boolean $iscancelled
     * @return Task
     */
    public function setIscancelled($iscancelled)
    {
        $this->iscancelled = $iscancelled;

        return $this;
    }

    /**
     * Get iscancelled
     *
     * @return boolean 
     */
    public function getIscancelled()
    {
        return $this->iscancelled;
    }

    /**
     * Set delflag
     *
     * @param boolean $delflag
     * @return Task
     */
    public function setDelflag($delflag)
    {
        $this->delflag = $delflag;

        return $this;
    }

    /**
     * Get delflag
     *
     * @return boolean 
     */
    public function getDelflag()
    {
        return $this->delflag;
    }

    /**
     * Add users
     *
     * @param \Usolv\TrackingBundle\Entity\User $users
     * @return Task
     */
    public function addUser(\Usolv\TrackingBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Usolv\TrackingBundle\Entity\User $users
     */
    public function removeUser(\Usolv\TrackingBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
