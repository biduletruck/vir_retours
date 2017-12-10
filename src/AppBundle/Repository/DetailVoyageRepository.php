<?php

namespace AppBundle\Repository;

/**
 * DetailVoyageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DetailVoyageRepository extends \Doctrine\ORM\EntityRepository
{
    public function findPackageInTravel($numeroVoyage)
    {
        $query = $this->createQueryBuilder('d')
            ->select('d', 'g')
            ->join('d.retours', 'g')
            ->where('d.id = :voyage')
            ->setParameter('voyage', $numeroVoyage)
            ->getQuery();

        return $query->getResult();
    }
}
