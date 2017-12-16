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
     * Set numeroSage
     *
     * @param string $numeroSage
     *
     * @return GestionRetour
     */
    public function setNumeroSage($numeroSage)
    {
        $this->numeroSage = $numeroSage;

        return $this;
    }

    /**
     * Get numeroSage
     *
     * @return string
     */
    public function getNumeroSage()
    {
        return $this->numeroSage;
    }

    /**
     * Set numeroDonneurOrdre
     *
     * @param string $numeroDonneurOrdre
     *
     * @return GestionRetour
     */
    public function setNumeroDonneurOrdre($numeroDonneurOrdre)
    {
        $this->numeroDonneurOrdre = $numeroDonneurOrdre;

        return $this;
    }

    /**
     * Get numeroDonneurOrdre
     *
     * @return string
     */
    public function getNumeroDonneurOrdre()
    {
        return $this->numeroDonneurOrdre;
    }

    /**
     * Set nomDestinataire
     *
     * @param string $nomDestinataire
     *
     * @return GestionRetour
     */
    public function setNomDestinataire($nomDestinataire)
    {
        $this->nomDestinataire = $nomDestinataire;

        return $this;
    }

    /**
     * Get nomDestinataire
     *
     * @return string
     */
    public function getNomDestinataire()
    {
        return $this->nomDestinataire;
    }

    /**
     * Set nombreColis
     *
     * @param integer $nombreColis
     *
     * @return GestionRetour
     */
    public function setNombreColis($nombreColis)
    {
        $this->nombreColis = $nombreColis;

        return $this;
    }

    /**
     * Get nombreColis
     *
     * @return integer
     */
    public function getNombreColis()
    {
        return $this->nombreColis;
    }

    /**
     * Set nombreSupport
     *
     * @param integer $nombreSupport
     *
     * @return GestionRetour
     */
    public function setNombreSupport($nombreSupport)
    {
        $this->nombreSupport = $nombreSupport;

        return $this;
    }

    /**
     * Get nombreSupport
     *
     * @return integer
     */
    public function getNombreSupport()
    {
        return $this->nombreSupport;
    }

    /**
     * Set dateDemandeDsa
     *
     * @param \DateTime $dateDemandeDsa
     *
     * @return GestionRetour
     */
    public function setDateDemandeDsa($dateDemandeDsa)
    {
        $this->dateDemandeDsa = $dateDemandeDsa;

        return $this;
    }

    /**
     * Get dateDemandeDsa
     *
     * @return \DateTime
     */
    public function getDateDemandeDsa()
    {
        return $this->dateDemandeDsa;
    }

    /**
     * Set dateReponseDemandeDsa
     *
     * @param \DateTime $dateReponseDemandeDsa
     *
     * @return GestionRetour
     */
    public function setDateReponseDemandeDsa($dateReponseDemandeDsa)
    {
        $this->dateReponseDemandeDsa = $dateReponseDemandeDsa;

        return $this;
    }

    /**
     * Get dateReponseDemandeDsa
     *
     * @return \DateTime
     */
    public function getDateReponseDemandeDsa()
    {
        return $this->dateReponseDemandeDsa;
    }

    /**
     * Set numeroRaq
     *
     * @param string $numeroRaq
     *
     * @return GestionRetour
     */
    public function setNumeroRaq($numeroRaq)
    {
        $this->numeroRaq = $numeroRaq;

        return $this;
    }

    /**
     * Get numeroRaq
     *
     * @return string
     */
    public function getNumeroRaq()
    {
        return $this->numeroRaq;
    }

    /**
     * Set dateReceptionBonReprise
     *
     * @param \DateTime $dateReceptionBonReprise
     *
     * @return GestionRetour
     */
    public function setDateReceptionBonReprise($dateReceptionBonReprise)
    {
        $this->dateReceptionBonReprise = $dateReceptionBonReprise;

        return $this;
    }

    /**
     * Get dateReceptionBonReprise
     *
     * @return \DateTime
     */
    public function getDateReceptionBonReprise()
    {
        return $this->dateReceptionBonReprise;
    }

    /**
     * Set dateEntreeEntrepot
     *
     * @param \DateTime $dateEntreeEntrepot
     *
     * @return GestionRetour
     */
    public function setDateEntreeEntrepot($dateEntreeEntrepot)
    {
        $this->dateEntreeEntrepot = $dateEntreeEntrepot;

        return $this;
    }

    /**
     * Get dateEntreeEntrepot
     *
     * @return \DateTime
     */
    public function getDateEntreeEntrepot()
    {
        return $this->dateEntreeEntrepot;
    }

    /**
     * Set dateSortieEntrepot
     *
     * @param \DateTime $dateSortieEntrepot
     *
     * @return GestionRetour
     */
    public function setDateSortieEntrepot($dateSortieEntrepot)
    {
        $this->dateSortieEntrepot = $dateSortieEntrepot;

        return $this;
    }

    /**
     * Get dateSortieEntrepot
     *
     * @return \DateTime
     */
    public function getDateSortieEntrepot()
    {
        return $this->dateSortieEntrepot;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GestionRetour
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set agence
     *
     * @param \AppBundle\Entity\Agence $agence
     *
     * @return GestionRetour
     */
    public function setAgence(\AppBundle\Entity\Agence $agence)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \AppBundle\Entity\Agence
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set prestation
     *
     * @param \AppBundle\Entity\Prestation $prestation
     *
     * @return GestionRetour
     */
    public function setPrestation(\AppBundle\Entity\Prestation $prestation = null)
    {
        $this->prestation = $prestation;

        return $this;
    }

    /**
     * Get prestation
     *
     * @return \AppBundle\Entity\Prestation
     */
    public function getPrestation()
    {
        return $this->prestation;
    }

    /**
     * Set motifRetour
     *
     * @param \AppBundle\Entity\MotifRetour $motifRetour
     *
     * @return GestionRetour
     */
    public function setMotifRetour(\AppBundle\Entity\MotifRetour $motifRetour = null)
    {
        $this->motifRetour = $motifRetour;

        return $this;
    }

    /**
     * Get motifRetour
     *
     * @return \AppBundle\Entity\MotifRetour
     */
    public function getMotifRetour()
    {
        return $this->motifRetour;
    }

    /**
     * Set emplacement
     *
     * @param \AppBundle\Entity\Emplacement $emplacement
     *
     * @return GestionRetour
     */
    public function setEmplacement(\AppBundle\Entity\Emplacement $emplacement = null)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return \AppBundle\Entity\Emplacement
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * Set magasin
     *
     * @param \AppBundle\Entity\Magasin $magasin
     *
     * @return GestionRetour
     */
    public function setMagasin(\AppBundle\Entity\Magasin $magasin)
    {
        $this->magasin = $magasin;

        return $this;
    }

    /**
     * Get magasin
     *
     * @return \AppBundle\Entity\Magasin
     */
    public function getMagasin()
    {
        return $this->magasin;
    }



    /**
     * Set donneurOrdre
     *
     * @param \AppBundle\Entity\DonneurOrdre $donneurOrdre
     *
     * @return GestionRetour
     */
    public function setDonneurOrdre(\AppBundle\Entity\DonneurOrdre $donneurOrdre = null)
    {
        $this->donneurOrdre = $donneurOrdre;

        return $this;
    }

    /**
     * Get donneurOrdre
     *
     * @return \AppBundle\Entity\DonneurOrdre
     */
    public function getDonneurOrdre()
    {
        return $this->donneurOrdre;
    }


    /**
     * Set voyage
     *
     * @param boolean $voyage
     *
     * @return GestionRetour
     */
    public function setVoyage($voyage)
    {
        $this->voyage = $voyage;

        return $this;
    }

    /**
     * Get voyage
     *
     * @return boolean
     */
    public function getVoyage()
    {
        return $this->voyage;
    }
}
