<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat
 *
 * @ORM\Table(name="etat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtatRepository")
 */
class Etat
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
     * @ORM\Column(name="nomEtat", type="string", length=255, unique=true)
     */
    private $nomEtat;


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
     * Set nomEtat
     *
     * @param string $nomEtat
     *
     * @return Etat
     */
    public function setNomEtat($nomEtat)
    {
        $this->nomEtat = $nomEtat;

        return $this;
    }

    /**
     * Get nomEtat
     *
     * @return string
     */
    public function getNomEtat()
    {
        return $this->nomEtat;
    }
}
