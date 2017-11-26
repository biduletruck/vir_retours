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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DonneurOrdre",inversedBy="magasins")
     */
    private $donneurOrdre;





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
     * Set donneurOrdre
     *
     * @param \AppBundle\Entity\DonneurOrdre $donneurOrdre
     *
     * @return Magasin
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

    public function __toString()
    {
        return $this->nomMagasin;
    }

}
