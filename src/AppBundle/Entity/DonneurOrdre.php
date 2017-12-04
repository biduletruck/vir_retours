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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Magasin", inversedBy="donneurOrdres")
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
}
