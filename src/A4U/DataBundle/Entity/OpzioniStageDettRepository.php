<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OpzioniStageDettRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OpzioniStageDettRepository extends EntityRepository
{

    /**
     * Get Choices
     * @param string|null
     * @return array 
     */
    public function getChoices($studyField)
    {
        
        #$regione = $scuola->getRegione();

        $qb = $this->getEntityManager()->createQueryBuilder();
        
        $qb->select('s0')
        ->from('A4UDataBundle:OpzioniStageDett', 's0')
        ->where('s0.idOpzione = :opzionestage')
        #->groupBy('s0.provincia')
        ->setParameters(array(
            'opzionestage' => ($studyField)
        ));

        return $qb;
    }    

}
