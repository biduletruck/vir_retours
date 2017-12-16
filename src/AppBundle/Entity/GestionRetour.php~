<?php

namespace AppBundle\Entity;

use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GestionRetour
 *
 * @ORM\Table(name="gestion_retour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GestionRetourRepository")
 */
class GestionRetour
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
     * @ORM\ManyToOne(targetEntity="Agence")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agence;


    /**
     * @var string
     *
     * @ORM\Column(name="numeroSage", type="string", length=255)
     */
    private $numeroSage;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroDonneurOrdre", type="string", length=255)
     */
    private $numeroDonneurOrdre;

    /**
     * @ORM\ManyToOne(targetEntity="Prestation")
     */
    private $prestation;

    /**
     * @var string
     *
     * @ORM\Column(name="nomDestinataire", type="string", length=255)
     */
    private $nomDestinataire;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreColis", type="integer")
     */
    private $nombreColis;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreSupport", type="integer")
     */
    private $nombreSupport;

    /**
     * @ORM\ManyToOne(targetEntity="MotifRetour")
     */
    private $motifRetour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemandeDsa", type="date", nullable=true)
     */
    private $dateDemandeDsa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReponseDemandeDsa", type="date", nullable=true)
     */
    private $dateReponseDemandeDsa;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroRaq", type="string", length=255, nullable=true)
     */
    private $numeroRaq;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReceptionBonReprise", type="date", nullable=true)
     */
    private $dateReceptionBonReprise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEntreeEntrepot", type="date", nullable=false)
     */
    private $dateEntreeEntrepot;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortieEntrepot", type="date", nullable=true)
     */
    private $dateSortieEntrepot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Emplacement")

     */
    private $emplacement;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Magasin")

     */
    private $magasin;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DonneurOrdre")
     */
    private $donneurOrdre;

    /**
     * @var bool
     *
     * @ORM\Column(name="voyage", type="boolean")
     */
    private $voyage;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    public function __construct()
    {
        $this->setDateEntreeEntrepot(new \DateTime()) ; // Date du jour
        $this->setVoyage(0);
    }
}
