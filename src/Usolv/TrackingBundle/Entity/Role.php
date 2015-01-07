<?php
namespace Usolv\TrackingBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 */
class Role implements RoleInterface
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=30, unique=true)
	 */
	private $name;

	/**
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="roles")
	 */
	private $users;

	public function __construct()
	{
		$this->users = new ArrayCollection();
	}
	
	/**
	 * @see RoleInterface
	 */
	public function getRole()
	{
		return $this->role;
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
     * Set name
     *
     * @param string $name
     * @return Role
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
     * Add users
     *
     * @param \Usolv\TrackingBundle\Entity\User $users
     * @return Role
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
