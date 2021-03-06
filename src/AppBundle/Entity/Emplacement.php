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
     * @ORM\Column(name="numeroEmplacement", type="string", length=255, unique=false, nullable=true)
     */
    private $numeroEmplacement;

    /**
     * @var string
     *
     * @ORM\Column(name="codeSage", type="string", length=255, unique=false, nullable=false)
     */
    private $codeSage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStockage", type="date", nullable=true)
     */
    private $dateStockage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")

     */
    private $login;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GestionRetour", inversedBy="emplacement")

     */
    private $retour;



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
     * Set numeroEmplacement
     *
     * @param string $numeroEmplacement
     *
     * @return Emplacement
     */
    public function setNumeroEmplacement($numeroEmplacement)
    {
        $this->numeroEmplacement = $numeroEmplacement;

        return $this;
    }

    /**
     * Get numeroEmplacement
     *
     * @return string
     */
    public function getNumeroEmplacement()
    {
        return $this->numeroEmplacement;
    }

    /**
     * Set codeSage
     *
     * @param string $codeSage
     *
     * @return Emplacement
     */
    public function setCodeSage($codeSage)
    {
        $this->codeSage = $codeSage;

        return $this;
    }

    /**
     * Get codeSage
     *
     * @return string
     */
    public function getCodeSage()
    {
        return $this->codeSage;
    }

    /**
     * Set dateStockage
     *
     * @param \DateTime $dateStockage
     *
     * @return Emplacement
     */
    public function setDateStockage($dateStockage)
    {
        $this->dateStockage = $dateStockage;

        return $this;
    }

    /**
     * Get dateStockage
     *
     * @return \DateTime
     */
    public function getDateStockage()
    {
        return $this->dateStockage;
    }

    /**
     * Set login
     *
     * @param \AppBundle\Entity\User $login
     *
     * @return Emplacement
     */
    public function setLogin(\AppBundle\Entity\User $login = null)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return \AppBundle\Entity\User
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set retour
     *
     * @param \AppBundle\Entity\GestionRetour $retour
     *
     * @return Emplacement
     */
    public function setRetour(\AppBundle\Entity\GestionRetour $retour = null)
    {
        $this->retour = $retour;

        return $this;
    }

    /**
     * Get retour
     *
     * @return \AppBundle\Entity\GestionRetour
     */
    public function getRetour()
    {
        return $this->retour;
    }

    public function __toString()
    {
        return $this->retour;
    }
}
