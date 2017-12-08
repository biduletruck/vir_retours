<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestation
 *
 * @ORM\Table(name="prestation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrestationRepository")
 */
class Prestation
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
     * @ORM\Column(name="nomPrestation", type="string", length=255, unique=true)
     */
    private $nomPrestation;


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
     * Set nomPrestation
     *
     * @param string $nomPrestation
     *
     * @return Prestation
     */
    public function setNomPrestation($nomPrestation)
    {
        $this->nomPrestation = $nomPrestation;

        return $this;
    }

    /**
     * Get nomPrestation
     *
     * @return string
     */
    public function getNomPrestation()
    {
        return $this->nomPrestation;
    }
}
