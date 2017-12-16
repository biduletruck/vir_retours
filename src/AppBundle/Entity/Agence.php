<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agence
 *
 * @ORM\Table(name="agence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgenceRepository")
 */
class Agence
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
     * @ORM\Column(name="nomAgence", type="string", length=255)
     */
    private $nomAgence;

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
     * Set nomAgence
     *
     * @param string $nomAgence
     *
     * @return Agence
     */
    public function setNomAgence($nomAgence)
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    /**
     * Get nomAgence
     *
     * @return string
     */
    public function getNomAgence()
    {
        return $this->nomAgence;
    }

    public function __toString()
    {
        return $this->nomAgence;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->magasins = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add magasin
     *
     * @param \AppBundle\Entity\Magasin $magasin
     *
     * @return Agence
     */
    public function addMagasin(\AppBundle\Entity\Magasin $magasin)
    {
        $this->magasins[] = $magasin;

        return $this;
    }

    /**
     * Remove magasin
     *
     * @param \AppBundle\Entity\Magasin $magasin
     */
    public function removeMagasin(\AppBundle\Entity\Magasin $magasin)
    {
        $this->magasins->removeElement($magasin);
    }

    /**
     * Get magasins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMagasins()
    {
        return $this->magasins;
    }
}
