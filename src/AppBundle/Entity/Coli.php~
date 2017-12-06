<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coli
 *
 * @ORM\Table(name="coli")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ColiRepository")
 */
class Coli
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
     * @ORM\Column(name="colis", type="string", length=255)
     */
    private $colis;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DonneurOrdre", mappedBy="magasins")
     */
    private $donneurOrdres;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Magasin")
     */
    private $magasin;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set colis
     *
     * @param string $colis
     *
     * @return Coli
     */
    public function setColis($colis)
    {
        $this->colis = $colis;

        return $this;
    }

    /**
     * Get colis
     *
     * @return string
     */
    public function getColis()
    {
        return $this->colis;
    }

    /**
     * Set magasin
     *
     * @param \AppBundle\Entity\Magasin $magasin
     *
     * @return Coli
     */
    public function setMagasin(\AppBundle\Entity\Magasin $magasin = null)
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
     * Constructor
     */
    public function __construct()
    {
        $this->donneurOrdres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add donneurOrdre
     *
     * @param \AppBundle\Entity\DonneurOrdre $donneurOrdre
     *
     * @return Coli
     */
    public function addDonneurOrdre(\AppBundle\Entity\DonneurOrdre $donneurOrdre)
    {
        $this->donneurOrdres[] = $donneurOrdre;

        return $this;
    }

    /**
     * Remove donneurOrdre
     *
     * @param \AppBundle\Entity\DonneurOrdre $donneurOrdre
     */
    public function removeDonneurOrdre(\AppBundle\Entity\DonneurOrdre $donneurOrdre)
    {
        $this->donneurOrdres->removeElement($donneurOrdre);
    }

    /**
     * Get donneurOrdres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDonneurOrdres()
    {
        return $this->donneurOrdres;
    }


}
