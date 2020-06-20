<?php

namespace AvisBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="AvisBundle\Repository\AvisRepository")
 */
class Avis
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
     * @ORM\OneToMany(targetEntity="ActiviteBundle\Entity\Activite")
     * @ORM\JoinColumn(referencedColumnName="id")
     *
     * @ORM\Column(name="activite", type="integer")
     */
    private $activite;

    /**
     * @ORM\OneToMany(targetEntity="User\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="nom")
     * @var string
     *
     * @ORM\Column(name="adress_user", type="string", length=255)
     */
    private $adressUser;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;


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
     * Set activite
     *
     * @param integer $activite
     *
     * @return Avis
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return int
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set adressUser
     *
     * @param string $adressUser
     *
     * @return Avis
     */
    public function setAdressUser($adressUser)
    {
        $this->adressUser = $adressUser;

        return $this;
    }

    /**
     * Get adressUser
     *
     * @return string
     */
    public function getAdressUser()
    {
        return $this->adressUser;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Avis
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Avis
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }
}

