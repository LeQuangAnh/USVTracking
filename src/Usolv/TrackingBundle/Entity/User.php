<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Usolv\TrackingBundle\Entity\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
	/**
	 * @ORM\Column(name="id", type="string", length=8)
	 * @ORM\Id
	 */
	protected $trid;

	/**
	 * @ORM\Column(type="string", length=50)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	protected $initialname;

	/**
	 * @ORM\Column(type="string", length=20, nullable=true)
	 */
	protected $adname;	

	/**
	 * @ORM\Column(type="string", length=10, nullable=true)
	 */
	protected $dev;

	/**
	 * @ORM\Column(type="string", length=64)
	 */
	private $password;
	
	/**
	 * @ORM\Column(type="string", length=64, nullable=true)
	 */
	private $trpassword;
	
	/**
     * @ORM\Column(name="isactive", type="boolean", options={"default":1})
     */
    private $isactive;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
	 */
	private $roles;
	
	/**
	 * @ORM\ManyToMany(targetEntity="ProjectRole", inversedBy="users")
	 */
	private $projectroles;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Task", inversedBy="users")
	 */
	private $tasks;
	
	public function __construct()
	{
		$this->roles = new ArrayCollection();
		$this->projectroles = new ArrayCollection();
		$this->tasks = new ArrayCollection();
	}
	
	/**
	 * @inheritDoc
	 */
	public function getUsername()
	{
		return $this->name;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getSalt()
	{
		return null;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getPassword()
	{
		return $this->password;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getRoles()
	{
		return $this->roles->toArray();
	}
	
	/**
	 * @inheritDoc
	 */
	public function eraseCredentials()
	{
	}
	
	/**
	 * @inheritDoc
	 */
	public function isAccountNonExpired()
	{
		return true;
	}
	
	/**
	 * @inheritDoc
	 */
	public function isAccountNonLocked()
	{
		return true;
	}
	
	/**
	 * @inheritDoc
	 */
	public function isCredentialsNonExpired()
	{
		return true;
	}
	
	/**
	 * @inheritDoc
	 */
	public function isEnabled()
	{
		return $this->isactive;
	}
	
	/**
	 * @see \Serializable::serialize()
	 */
	public function serialize()
	{
		return serialize(array(
				$this->trid,
				$this->name,
				$this->password,
		));
	}
	
	/**
	 * @see \Serializable::unserialize()
	 */
	public function unserialize($serialized)
	{
		list (
				$this->trid,
				$this->name,
				$this->password,
		) = unserialize($serialized);
	}

    /**
     * Set trid
     *
     * @param string $trid
     * @return User
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
     * @return User
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
     * Set initialname
     *
     * @param string $initialname
     * @return User
     */
    public function setInitialname($initialname)
    {
        $this->initialname = $initialname;

        return $this;
    }

    /**
     * Get initialname
     *
     * @return string 
     */
    public function getInitialname()
    {
        return $this->initialname;
    }

    /**
     * Set adname
     *
     * @param string $adname
     * @return User
     */
    public function setAdname($adname)
    {
        $this->adname = $adname;

        return $this;
    }

    /**
     * Get adname
     *
     * @return string 
     */
    public function getAdname()
    {
        return $this->adname;
    }

    /**
     * Set dev
     *
     * @param string $dev
     * @return User
     */
    public function setDev($dev)
    {
        $this->dev = $dev;

        return $this;
    }

    /**
     * Get dev
     *
     * @return string 
     */
    public function getDev()
    {
        return $this->dev;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set trpassword
     *
     * @param string $trpassword
     * @return User
     */
    public function setTrpassword($trpassword)
    {
        $this->trpassword = $trpassword;

        return $this;
    }

    /**
     * Get trpassword
     *
     * @return string 
     */
    public function getTrpassword()
    {
        return $this->trpassword;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     * @return User
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean 
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Add roles
     *
     * @param \Usolv\TrackingBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\Usolv\TrackingBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Usolv\TrackingBundle\Entity\Role $roles
     */
    public function removeRole(\Usolv\TrackingBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Set id
     *
     * @param string $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add projectroles
     *
     * @param \Usolv\TrackingBundle\Entity\ProjectRole $projectroles
     * @return User
     */
    public function addProjectrole(\Usolv\TrackingBundle\Entity\ProjectRole $projectroles)
    {
        $this->projectroles[] = $projectroles;

        return $this;
    }

    /**
     * Remove projectroles
     *
     * @param \Usolv\TrackingBundle\Entity\ProjectRole $projectroles
     */
    public function removeProjectrole(\Usolv\TrackingBundle\Entity\ProjectRole $projectroles)
    {
        $this->projectroles->removeElement($projectroles);
    }

    /**
     * Get projectroles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectroles()
    {
        return $this->projectroles;
    }

    /**
     * Add projects
     *
     * @param \Usolv\TrackingBundle\Entity\Project $projects
     * @return User
     */
    public function addProject(\Usolv\TrackingBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \Usolv\TrackingBundle\Entity\Project $projects
     */
    public function removeProject(\Usolv\TrackingBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add tasks
     *
     * @param \Usolv\TrackingBundle\Entity\Task $tasks
     * @return User
     */
    public function addTask(\Usolv\TrackingBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Usolv\TrackingBundle\Entity\Task $tasks
     */
    public function removeTask(\Usolv\TrackingBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
