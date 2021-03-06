<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Voyage
 *
 * @ORM\Table(name="voyage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VoyageRepository")
 */
class Voyage
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
     * @ORM\Column(name="nomVoyage", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nomVoyage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     * @Assert\NotBlank()
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetour", type="date", nullable=true)
     * @Assert\NotBlank()
     */
    private $dateRetour;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agence")
     *
     */
    private $agence;

    /**
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $createur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rattachement")
     */
    private $rattachement;

    public function __construct()
    {
        $this->setStatut(false);
        $this->setDateCreation(new \DateTime());
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
     * Set nomVoyage
     *
     * @param string $nomVoyage
     *
     * @return Voyage
     */
    public function setNomVoyage($nomVoyage)
    {
        $this->nomVoyage = $nomVoyage;

        return $this;
    }

    /**
     * Get nomVoyage
     *
     * @return string
     */
    public function getNomVoyage()
    {
        return $this->nomVoyage;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Voyage
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Voyage
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Voyage
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set agence
     *
     * @param \AppBundle\Entity\Agence $agence
     *
     * @return Voyage
     */
    public function setAgence(\AppBundle\Entity\Agence $agence = null)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \AppBundle\Entity\Agence
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set createur
     *
     * @param \AppBundle\Entity\User $createur
     *
     * @return Voyage
     */
    public function setCreateur(\AppBundle\Entity\User $createur = null)
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * Get createur
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * Set rattachement
     *
     * @param \AppBundle\Entity\Rattachement $rattachement
     *
     * @return Voyage
     */
    public function setRattachement(\AppBundle\Entity\Rattachement $rattachement = null)
    {
        $this->rattachement = $rattachement;

        return $this;
    }

    /**
     * Get rattachement
     *
     * @return \AppBundle\Entity\Rattachement
     */
    public function getRattachement()
    {
        return $this->rattachement;
    }
}
