<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retour
 *
 * @ORM\Table(name="retour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RetourRepository")
 */
class Retour
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
     * @ORM\Column(name="nomRetour", type="string", length=255, unique=true)
     */
    private $nomRetour;


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
     * Set nomRetour
     *
     * @param string $nomRetour
     *
     * @return Retour
     */
    public function setNomRetour($nomRetour)
    {
        $this->nomRetour = $nomRetour;

        return $this;
    }

    /**
     * Get nomRetour
     *
     * @return string
     */
    public function getNomRetour()
    {
        return $this->nomRetour;
    }
}

