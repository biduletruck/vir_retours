<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DonneurOrdre
 *
 * @ORM\Table(name="donneur_ordre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DonneurOrdreRepository")
 */
class DonneurOrdre
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
     * @ORM\Column(name="nomDonneurOrdre", type="string", length=255, unique=true)
     */
    private $nomDonneurOrdre;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Magasin", mappedBy="donneurOrdres")
     */

    private $magasins;


    public function __toString()
    {
        return $this->nomDonneurOrdre;
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
     * Set nomDonneurOrdre
     *
     * @param string $nomDonneurOrdre
     *
     * @return DonneurOrdre
     */
    public function setNomDonneurOrdre($nomDonneurOrdre)
    {
        $this->nomDonneurOrdre = $nomDonneurOrdre;

        return $this;
    }

    /**
     * Get nomDonneurOrdre
     *
     * @return string
     */
    public function getNomDonneurOrdre()
    {
        return $this->nomDonneurOrdre;
    }

    /**
     * Set magasins
     *
     * @param \AppBundle\Entity\Magasin $magasins
     *
     * @return DonneurOrdre
     */
    public function setMagasins(\AppBundle\Entity\Magasin $magasins = null)
    {
        $this->magasins = $magasins;

        return $this;
    }

    /**
     * Get magasins
     *
     * @return \AppBundle\Entity\Magasin
     */
    public function   getMagasins()
    {
        return $this->magasins;
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
     * @return DonneurOrdre
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
}
