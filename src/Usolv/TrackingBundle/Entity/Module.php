<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="module")
 */
class Module
{
	/**
	 * @ORM\Column(type="string", length=100)
	 * @ORM\Id
	 */
	protected $project_name;

	/**
	 * @ORM\Column(type="string", length=30)
	 * @ORM\Id
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	protected $info1;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	protected $info2;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	protected $info3;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	protected $info4;
	
	/**
	 * @ORM\Column(type="string", length=50, nullable=true)
	 */
	protected $info5;

	/**
	 * @ORM\Column(type="boolean", options={"default":0})
	 */
	protected $delflag;

    /**
     * Set project_name
     *
     * @param string $projectName
     * @return Module
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
     * Set id
     *
     * @param string $id
     * @return Module
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
     * Set name
     *
     * @param string $name
     * @return Module
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
     * Set info1
     *
     * @param string $info1
     * @return Module
     */
    public function setInfo1($info1)
    {
        $this->info1 = $info1;

        return $this;
    }

    /**
     * Get info1
     *
     * @return string 
     */
    public function getInfo1()
    {
        return $this->info1;
    }

    /**
     * Set info2
     *
     * @param string $info2
     * @return Module
     */
    public function setInfo2($info2)
    {
        $this->info2 = $info2;

        return $this;
    }

    /**
     * Get info2
     *
     * @return string 
     */
    public function getInfo2()
    {
        return $this->info2;
    }

    /**
     * Set info3
     *
     * @param string $info3
     * @return Module
     */
    public function setInfo3($info3)
    {
        $this->info3 = $info3;

        return $this;
    }

    /**
     * Get info3
     *
     * @return string 
     */
    public function getInfo3()
    {
        return $this->info3;
    }

    /**
     * Set info4
     *
     * @param string $info4
     * @return Module
     */
    public function setInfo4($info4)
    {
        $this->info4 = $info4;

        return $this;
    }

    /**
     * Get info4
     *
     * @return string 
     */
    public function getInfo4()
    {
        return $this->info4;
    }

    /**
     * Set info5
     *
     * @param string $info5
     * @return Module
     */
    public function setInfo5($info5)
    {
        $this->info5 = $info5;

        return $this;
    }

    /**
     * Get info5
     *
     * @return string 
     */
    public function getInfo5()
    {
        return $this->info5;
    }

    /**
     * Set delflag
     *
     * @param boolean $delflag
     * @return Module
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
}
