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
   * @ORM\ManyToOne(targetEntity="Module")
   * @ORM\JoinColumn(name="module_id", referencedColumnName="id")
   */
  protected $module;
  
  /**
   * @ORM\ManyToOne(targetEntity="Wbs")
   * @ORM\JoinColumn(name="wbs_id", referencedColumnName="id")
   */
  protected $wbs;
  
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
   * Set module
   *
   * @param string $module          
   * @return Task
   */
  public function setModule($module)
  {
    $this->module = $module;
    
    return $this;
  }
  
  /**
   * Get module
   *
   * @return string
   */
  public function getModule()
  {
    return $this->module;
  }
  
  /**
   * Set wbs
   *
   * @param string $wbs          
   * @return Task
   */
  public function setWbs($wbs)
  {
    $this->wbs = $wbs;
    
    return $this;
  }
  
  /**
   * Get wbs
   *
   * @return string
   */
  public function getWbs()
  {
    return $this->wbs;
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
