<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="project")
 */
class Project
{
	/**
	 * @ORM\Column(name="id", type="string", length=15)
	 * @ORM\Id
	 */
	protected $trid; 
	
	/**
	 * @ORM\Column(type="string", length=100)
	 * @ORM\Id
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="boolean", options={"default":1})
	 */
	protected $hasschedule;
	
	/**
	 * @ORM\Column(type="boolean", options={"default":1})
	 */
	protected $isenabled;
	
	public function __construct()
	{
		$this->users = new ArrayCollection();
	}

    /**
     * Set trid
     *
     * @param string $trid
     * @return Project
     */
    public function setTrid($trid)
    {
        $this->trid = $trid;

        return $this;
    }

    /**
     * Get trid
     *
     * @return string 
     */
    public function getTrid()
    {
        return $this->trid;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set hasschedule
     *
     * @param boolean $hasschedule
     * @return Project
     */
    public function setHasschedule($hasschedule)
    {
        $this->hasschedule = $hasschedule;

        return $this;
    }

    /**
     * Get hasschedule
     *
     * @return boolean 
     */
    public function getHasschedule()
    {
        return $this->hasschedule;
    }

    /**
     * Set isenabled
     *
     * @param boolean $isenabled
     * @return Project
     */
    public function setIsenabled($isenabled)
    {
        $this->isenabled = $isenabled;

        return $this;
    }

    /**
     * Get isenabled
     *
     * @return boolean 
     */
    public function getIsenabled()
    {
        return $this->isenabled;
    }

    /**
     * Add users
     *
     * @param \Usolv\TrackingBundle\Entity\User $users
     * @return Project
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

    /**
     * Add modules
     *
     * @param \Usolv\TrackingBundle\Entity\Module $modules
     * @return Project
     */
    public function addModule(\Usolv\TrackingBundle\Entity\Module $modules)
    {
        $this->modules[] = $modules;

        return $this;
    }

    /**
     * Remove modules
     *
     * @param \Usolv\TrackingBundle\Entity\Module $modules
     */
    public function removeModule(\Usolv\TrackingBundle\Entity\Module $modules)
    {
        $this->modules->removeElement($modules);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModules()
    {
        return $this->modules;
    }
}
