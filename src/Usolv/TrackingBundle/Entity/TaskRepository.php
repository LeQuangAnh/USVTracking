<?php

namespace Usolv\TrackingBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends EntityRepository
{
  public function findByProject($projectname)
  {
    $query = $this->getEntityManager()->createQuery(
      'SELECT m.id module_id, p.name, m.code module_code, m.name module_name, w.name wbs_name, 
    	u.initialname planresource, t.planstart, t.planfinish, t.plancost
        FROM UsolvTrackingBundle:Project p
        LEFT JOIN p.modules m
        LEFT JOIN p.wbss w
        LEFT JOIN UsolvTrackingBundle:Task t    		
        WITH t.project_name = p.name 
    	  AND t.module = m.id 
          AND t.wbs = w.id
    	LEFT JOIN t.users u
        WHERE p.name = :project_name
        ORDER BY m.name ASC, w.order ASC')->setParameter('project_name', $projectname);
    
    try
    {
      $taskList = $query->getArrayResult();
    }
    catch(NoResultException $e)
    {
      $message = sprintf(
        'Unable to find an active UsolvTrackingBundle:Task object identified by "%s".', $projectname);
      throw new NoResultException($message, 0, $e);
    }
    
    return $taskList;
  }
}
