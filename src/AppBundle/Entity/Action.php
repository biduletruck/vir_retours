<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActionRepository")
 */
class Action
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
     * @ORM\Column(name="nomAction", type="string", length=255, unique=true)
     */
    private $nomAction;


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
     * Set nomAction
     *
     * @param string $nomAction
     *
     * @return Action
     */
    public function setNomAction($nomAction)
    {
        $this->nomAction = $nomAction;

        return $this;
    }

    /**
     * Get nomAction
     *
     * @return string
     */
    public function getNomAction()
    {
        return $this->nomAction;
    }
}
