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
    private $login;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Voyage")
     */
    private $voyage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GestionRetour")
     */
    private $retour;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDateAjout(new \DateTime());
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
     * Set voyage
     *
     * @param integer $voyage
     *
     * @return DetailVoyage
     */
    public function setVoyage($voyage)
    {
        $this->voyage = $voyage;

        return $this;
    }

    /**
     * Get voyage
     *
     * @return integer
     */
    public function getVoyage()
    {
        return $this->voyage;
    }

    /**
     * Set retour
     *
     * @param integer $retour
     *
     * @return DetailVoyage
     */
    public function setRetour($retour)
    {
        $this->retour = $retour;

        return $this;
    }

    /**
     * Get retour
     *
     * @return integer
     */
    public function getRetour()
    {
        return $this->retour;
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
     * Set login
     *
     * @param integer $login
     *
     * @return DetailVoyage
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return integer
     */
    public function getLogin()
    {
        return $this->login;
    }
}
