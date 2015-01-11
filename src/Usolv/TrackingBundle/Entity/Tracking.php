<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tracking")
 * @ORM\Entity(repositoryClass="Usolv\TrackingBundle\Entity\TrackingRepository")
 */
class Tracking
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  /**
   * @ORM\Column(type="datetime")
   */
  protected $date;
  
  /**
   * @ORM\ManyToOne(targetEntity="User")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  private $user;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $workingtype;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $project_name;
  
  /**
   * @ORM\ManyToOne(targetEntity="Wbs")
   * @ORM\JoinColumn(name="wbs_id", referencedColumnName="id")
   */
  protected $wbs;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $phase;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $process;
  
  /**
   * @ORM\ManyToOne(targetEntity="Module")
   * @ORM\JoinColumn(name="module_id", referencedColumnName="id")
   */
  protected $module;
  
  /**
   * @ORM\Column(type="integer")
   */
  protected $progress;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $description;
  
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
   * Set date
   *
   * @param \DateTime $date          
   * @return Tracking
   */
  public function setDate($date)
  {
    $this->date = $date;
    
    return $this;
  }
  
  /**
   * Get date
   *
   * @return \DateTime
   */
  public function getDate()
  {
    return $this->date;
  }
  
  /**
   * Set workingtype
   *
   * @param string $workingtype          
   * @return Tracking
   */
  public function setWorkingtype($workingtype)
  {
    $this->workingtype = $workingtype;
    
    return $this;
  }
  
  /**
   * Get workingtype
   *
   * @return string
   */
  public function getWorkingtype()
  {
    return $this->workingtype;
  }
  
  /**
   * Set project_name
   *
   * @param string $projectName          
   * @return Tracking
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
   * Set phase
   *
   * @param string $phase          
   * @return Tracking
   */
  public function setPhase($phase)
  {
    $this->phase = $phase;
    
    return $this;
  }
  
  /**
   * Get phase
   *
   * @return string
   */
  public function getPhase()
  {
    return $this->phase;
  }
  
  /**
   * Set process
   *
   * @param string $process          
   * @return Tracking
   */
  public function setProcess($process)
  {
    $this->process = $process;
    
    return $this;
  }
  
  /**
   * Get process
   *
   * @return string
   */
  public function getProcess()
  {
    return $this->process;
  }
  
  /**
   * Set progress
   *
   * @param integer $progress          
   * @return Tracking
   */
  public function setProgress($progress)
  {
    $this->progress = $progress;
    
    return $this;
  }
  
  /**
   * Get progress
   *
   * @return integer
   */
  public function getProgress()
  {
    return $this->progress;
  }
  
  /**
   * Set description
   *
   * @param string $description          
   * @return Tracking
   */
  public function setDescription($description)
  {
    $this->description = $description;
    
    return $this;
  }
  
  /**
   * Get description
   *
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  
  /**
   * Set user
   *
   * @param \Usolv\TrackingBundle\Entity\User $user          
   * @return Tracking
   */
  public function setUser(\Usolv\TrackingBundle\Entity\User $user = null)
  {
    $this->user = $user;
    
    return $this;
  }
  
  /**
   * Get user
   *
   * @return \Usolv\TrackingBundle\Entity\User
   */
  public function getUser()
  {
    return $this->user;
  }
  
  /**
   * Set wbs
   *
   * @param \Usolv\TrackingBundle\Entity\Wbs $wbs          
   * @return Tracking
   */
  public function setWbs(\Usolv\TrackingBundle\Entity\Wbs $wbs = null)
  {
    $this->wbs = $wbs;
    
    return $this;
  }
  
  /**
   * Get wbs
   *
   * @return \Usolv\TrackingBundle\Entity\Wbs
   */
  public function getWbs()
  {
    return $this->wbs;
  }
  
  /**
   * Set module
   *
   * @param \Usolv\TrackingBundle\Entity\Module $module          
   * @return Tracking
   */
  public function setModule(\Usolv\TrackingBundle\Entity\Module $module = null)
  {
    $this->module = $module;
    
    return $this;
  }
  
  /**
   * Get module
   *
   * @return \Usolv\TrackingBundle\Entity\Module
   */
  public function getModule()
  {
    return $this->module;
  }
}
