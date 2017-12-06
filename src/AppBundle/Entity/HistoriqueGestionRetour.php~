<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueGestionRetour
 *
 * @ORM\Table(name="historique_gestion_retour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HistoriqueGestionRetourRepository")
 */
class HistoriqueGestionRetour
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
     * @ORM\ManyToOne(targetEntity="GestionRetour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retour;

    /**
     * @ORM\ManyToOne(targetEntity="Action")
     * @ORM\JoinColumn(nullable=false)
     */
    private $action;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAction", type="datetime")
     */
    private $dateAction;

    /**
     * @ORM\ManyToOne(targetEntity="Emplacement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $emplacement;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Utilisateur;


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
     * Set action
     *
     * @param string $action
     *
     * @return HistoriqueGestionRetour
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set dateAction
     *
     * @param \DateTime $dateAction
     *
     * @return HistoriqueGestionRetour
     */
    public function setDateAction($dateAction)
    {
        $this->dateAction = $dateAction;

        return $this;
    }

    /**
     * Get dateAction
     *
     * @return \DateTime
     */
    public function getDateAction()
    {
        return $this->dateAction;
    }

    /**
     * Set retour
     *
     * @param \AppBundle\Entity\GestionRetour $retour
     *
     * @return HistoriqueGestionRetour
     */
    public function setRetour(\AppBundle\Entity\GestionRetour $retour)
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

    /**
     * Set emplacement
     *
     * @param \AppBundle\Entity\Emplacement $emplacement
     *
     * @return HistoriqueGestionRetour
     */
    public function setEmplacement(\AppBundle\Entity\Emplacement $emplacement)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return \AppBundle\Entity\Emplacement
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\User $utilisateur
     *
     * @return HistoriqueGestionRetour
     */
    public function setUtilisateur(\AppBundle\Entity\User $utilisateur)
    {
        $this->Utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\User
     */
    public function getUtilisateur()
    {
        return $this->Utilisateur;
    }
}
