<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emplacement
 *
 * @ORM\Table(name="emplacement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmplacementRepository")
 */
class Emplacement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroEmplacement", type="string", length=255, unique=false)
     */
    private $numeroEmplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="codeSage", type="string", length=255, unique=false)
     */
    private $codeSage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStockage", type="date", nullable=true)
     */
    private $dateStockage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")

     */
    private $login;


}
