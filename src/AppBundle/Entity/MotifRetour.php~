<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotifRetour
 *
 * @ORM\Table(name="motif_retour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MotifRetourRepository")
 */
class MotifRetour
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
     * @ORM\Column(name="nomMotifRetour", type="string", length=255, unique=true)
     */
    private $nomMotifRetour;


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
     * Set nomMotifRetour
     *
     * @param string $nomMotifRetour
     *
     * @return MotifRetour
     */
    public function setNomMotifRetour($nomMotifRetour)
    {
        $this->nomMotifRetour = $nomMotifRetour;

        return $this;
    }

    /**
     * Get nomMotifRetour
     *
     * @return string
     */
    public function getNomMotifRetour()
    {
        return $this->nomMotifRetour;
    }
}
