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
     * @ORM\Column(name="nomEmplacement", type="string", length=255, unique=true)
     */
    private $nomEmplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="codeBarreEmplacement", type="string", length=255, unique=true)
     */
    private $codeBarreEmplacement;




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
     * Set nomEmplacement
     *
     * @param string $nomEmplacement
     *
     * @return Emplacement
     */
    public function setNomEmplacement($nomEmplacement)
    {
        $this->nomEmplacement = $nomEmplacement;

        return $this;
    }

    /**
     * Get nomEmplacement
     *
     * @return string
     */
    public function getNomEmplacement()
    {
        return $this->nomEmplacement;
    }

    /**
     * Set codeBarreEmplacement
     *
     * @param string $codeBarreEmplacement
     *
     * @return Emplacement
     */
    public function setCodeBarreEmplacement($codeBarreEmplacement)
    {
        $this->codeBarreEmplacement = $codeBarreEmplacement;

        return $this;
    }

    /**
     * Get codeBarreEmplacement
     *
     * @return string
     */
    public function getCodeBarreEmplacement()
    {
        return $this->codeBarreEmplacement;
    }

    public function __toString()
    {
        return $this->nomEmplacement;
    }
}
