<?php

namespace EventBundle\Repository;

/**
 * Event1Repository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Event1Repository extends \Doctrine\ORM\EntityRepository
{
    public function supprimer_evenement_depasse()
    {
        $sql=" delete EventBundle:Event1 e where .date<=current_date()";

        $qb=$this->getEntityManager()->
        createQuery($sql);
        $qb->execute();
    }
}
