<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magasin
 *
 * @ORM\Table(name="magasin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MagasinRepository")
 */
class  Magasin
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
     * @ORM\Column(name="nomMagasin", type="string", length=255)
     */
    private $nomMagasin;

    /**
     * @var int
     *
     * @ORM\Column(name="departementMagasin", type="integer")
     */
    private $departementMagasin;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Agence")
     */
    private $agences;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DonneurOrdre", inversedBy="magasins")
     */
    private $donneurOrdres;

    public function __toString()
    {
        return $this->nomMagasin;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->donneurOrdres = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomMagasin
     *
     * @param string $nomMagasin
     *
     * @return Magasin
     */
    public function setNomMagasin($nomMagasin)
    {
        $this->nomMagasin = $nomMagasin;

        return $this;
    }

    /**
     * Get nomMagasin
     *
     * @return string
     */
    public function getNomMagasin()
    {
        return $this->nomMagasin;
    }

    /**
     * Set departementMagasin
     *
     * @param integer $departementMagasin
     *
     * @return Magasin
     */
    public function setDepartementMagasin($departementMagasin)
    {
        $this->departementMagasin = $departementMagasin;

        return $this;
    }

    /**
     * Get departementMagasin
     *
     * @return integer
     */
    public function getDepartementMagasin()
    {
        return $this->departementMagasin;
    }

    /**
     * Add donneurOrdre
     *
     * @param \AppBundle\Entity\DonneurOrdre $donneurOrdre
     *
     * @return Magasin
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

    /**
     * Set donneurOrdres
     *
     * @param \AppBundle\Entity\DonneurOrdre $donneurOrdres
     *
     * @return Magasin
     */
    public function setDonneurOrdres(\AppBundle\Entity\DonneurOrdre $donneurOrdres = null)
    {
        $this->donneurOrdres = $donneurOrdres;

        return $this;
    }

    /**
     * Add agence
     *
     * @param \AppBundle\Entity\Agence $agence
     *
     * @return Magasin
     */
    public function addAgence(\AppBundle\Entity\Agence $agence)
    {
        $this->agences[] = $agence;

        return $this;
    }

    /**
     * Remove agence
     *
     * @param \AppBundle\Entity\Agence $agence
     */
    public function removeAgence(\AppBundle\Entity\Agence $agence)
    {
        $this->agences->removeElement($agence);
    }

    /**
     * Get agences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgences()
    {
        return $this->agences;
    }

    /**
     * Set agence
     *
     * @param \AppBundle\Entity\Agence $agence
     *
     * @return Magasin
     */
    public function setAgence(\AppBundle\Entity\Agence $agence = null)
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
}
