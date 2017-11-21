<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Mapping;

/**
 * GestionRetourRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GestionRetourRepository extends \Doctrine\ORM\EntityRepository
{

/*
    public function findInStock($idAgence)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT g
                    FROM AppBundle:GestionRetour g
                    WHERE g.dateSortieEntrepot IS NULL
                      AND g.agence '
                        );

        return $query->getResult();
    }
*/
        public function findInStock($idAgence)
        {
            $query = $this->createQueryBuilder('g')
                ->where('g.dateSortieEntrepot IS NULL')
                ->andWhere('g.agence = :agence')
                ->orderBy('g.dateSortieEntrepot')
                ->setParameter('agence', $idAgence)
                ->getQuery();

            return $query->getResult();
        }

    public function rechercheRetours($recherche, $idAgence)
    {
        $query = $this->createQueryBuilder('g')
            ->where('g.numeroSage LIKE :recherche')
            ->orWhere('g.numeroDonneurOrdre LIKE :recherche')
            ->orWhere('g.nomDestinataire LIKE :recherche')
            ->andWhere('g.agence = :agence')
            ->orderBy('g.dateEntreeEntrepot')
            ->setParameter('recherche', '%' . $recherche . '%')
            ->setParameter('agence', $idAgence)
            ->getQuery();

        return $query->getArrayResult();
    }
}