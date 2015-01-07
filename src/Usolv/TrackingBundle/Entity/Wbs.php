<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wbs")
 */
class Wbs
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
	protected $name;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Project", inversedBy="wbss")
	 * @ORM\JoinColumn(name="project_name", referencedColumnName="name")
	 **/
	protected $project;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $order;

	/**
	 * @ORM\Column(type="boolean", options={"default":0})
	 */
	protected $delflag;

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
     * @return Wbs
     */
    public function setProjectName($projectName)
    {
        $this->project_name = $projectName;

        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Wbs
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
     * Set order
     *
     * @param integer $order
     * @return Wbs
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set delflag
     *
     * @param boolean $delflag
     * @return Wbs
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
     * Set project
     *
     * @param \Usolv\TrackingBundle\Entity\Project $project
     * @return Wbs
     */
    public function setProject(\Usolv\TrackingBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Usolv\TrackingBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}
