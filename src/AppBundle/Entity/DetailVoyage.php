<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailVoyage
 *
 * @ORM\Table(name="detail_voyage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetailVoyageRepository")
 */
class DetailVoyage
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $logins;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Voyage", mappedBy="id")
     */
    private $voyages;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\GestionRetour")
     */
    private $retours;



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
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return DetailVoyage
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->voyages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDateAjout(new \DateTime());
    }

    /**
     * Set logins
     *
     * @param \AppBundle\Entity\User $logins
     *
     * @return DetailVoyage
     */
    public function setLogins(\AppBundle\Entity\User $logins = null)
    {
        $this->logins = $logins;

        return $this;
    }

    /**
     * Get logins
     *
     * @return \AppBundle\Entity\User
     */
    public function getLogins()
    {
        return $this->logins;
    }

    /**
     * Add voyage
     *
     * @param \AppBundle\Entity\Voyage $voyage
     *
     * @return DetailVoyage
     */
    public function addVoyage(\AppBundle\Entity\Voyage $voyage)
    {
        $this->voyages[] = $voyage;

        return $this;
    }

    /**
     * Remove voyage
     *
     * @param \AppBundle\Entity\Voyage $voyage
     */
    public function removeVoyage(\AppBundle\Entity\Voyage $voyage)
    {
        $this->voyages->removeElement($voyage);
    }

    /**
     * Get voyages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVoyages()
    {
        return $this->voyages;
    }

    /**
     * Set retours
     *
     * @param \AppBundle\Entity\GestionRetour $retours
     *
     * @return DetailVoyage
     */
    public function setRetours(\AppBundle\Entity\GestionRetour $retours = null)
    {
        $this->retours = $retours;

        return $this;
    }

    /**
     * Get retours
     *
     * @return \AppBundle\Entity\GestionRetour
     */
    public function getRetours()
    {
        return $this->retours;
    }
}
